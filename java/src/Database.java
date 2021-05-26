import java.sql.*;

public class Database {
    final String LOCATION = "jdbc:mysql://wheatley.cs.up.ac.za:3306/";
    final String PASS = "RHBBQV2AGCFKHVN4DCEMTXNMSE7YCQWE";
    final String DBNAME = "u20430168_election_system";
    final String USERNAME = "u20430168";

    Connection conn;

    public Database() throws SQLException {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection(LOCATION + DBNAME, USERNAME, PASS);
        } catch (Exception e) {
            System.out.println(e);
        }
    }

    public void closeConn() throws SQLException {
        conn.close();
    }

    public Node[] getNodes() throws SQLException {
        Statement stmt = conn.createStatement();
        String sql = "select mun_name, mun_id, met_id, local_id from municipality";
        ResultSet results = stmt.executeQuery(sql);
        Statement count = conn.createStatement();
        ResultSet temp = count.executeQuery(sql);
        temp.last();
        int rowCount = temp.getRow();

        Node[] nodes = new Node[rowCount];
        int i = 0;
        while(results.next()) {
            int mun_id = results.getInt(2);
            int[] ward_ids = getWards(mun_id);
            Party[] pInfo = null;
            Party[] pdInfo = null;
            Candidate[] cInfo = getcandidateInfo(ward_ids);

            if (results.getInt(3) == 0) {
                pInfo = getPartyInfo(ward_ids, 'd');
                pdInfo = getPartyInfo(ward_ids, 'l');
            } else
                pInfo = getPartyInfo(ward_ids, 'a');

            if (results.getInt(2) == 0)
                nodes[i++] = new Node(results.getString(1), results.getInt(2), results.getInt(4), pInfo, pdInfo, cInfo);
            else
                nodes[i++] = new Node(results.getString(1), results.getInt(2), results.getInt(3), pInfo, cInfo);

            break; // remove this
        }

        return nodes;
    }

    private int[] getWards(int mun_id) throws SQLException {
        String sql = "select ward_id from ward where mun_id = ?";
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setInt(1, mun_id);
        ResultSet results = stmt.executeQuery();

        PreparedStatement count = conn.prepareStatement(sql);
        count.setInt(1, mun_id);
        ResultSet temp = count.executeQuery();
        temp.last();
        int rowCount = temp.getRow();

        int[] ward_ids = new int[rowCount];
        int i = 0;
        while(results.next()) {
            ward_ids[i++] = results.getInt(1);
        }

        return ward_ids;
    }

    private Candidate[] getcandidateInfo(int[] ward_ids) throws SQLException {
        int length = 0;
        String[] candidates = new String[ward_ids.length];
        String[] fname = new String[ward_ids.length];
        String[] lname = new String[ward_ids.length];
        int[] votes = new int[ward_ids.length];
        for (int i = 0; i < ward_ids.length; i++) {
            String[] candidate = getcandidate(ward_ids[i]);
            int pos = getPos(candidates, candidate[0], length);

            if (pos == -1) {
                candidates[length] = candidate[0];
                fname[length] = candidate[1];
                lname[length] = candidate[2];
                votes[length] = 1;
                length++;
            } else {
                candidates[pos] = candidate[0];
                fname[pos] = candidate[1];
                lname[pos] = candidate[2];
                votes[pos]++;
            }
        }

        Candidate[] arr = new Candidate[length];
        for (int i = 0; i < length; i++)
            arr[i] = new Candidate(fname[i], lname[i], votes[i]);

        return arr;
    }

    private String[] getcandidate(int ward_id) throws SQLException {
        String sql = "select candidate.id_no, f_name, l_name from candidate inner join person on candidate.id_no = person.id_no where votes <> 0 and candidate.ward_id = ? order by votes desc";
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setInt(1, ward_id);
        ResultSet results = stmt.executeQuery();
        results.next();
        String[] arr = new String[3];
        arr[0] = results.getString(1);
        arr[1] = results.getString(2);
        arr[2] = results.getString(3);
        return arr; 
    }

    private Party[] getPartyInfo(int[] ward_ids, char t) throws SQLException {
        // note votes here are actually wards done
        int length = 0;
        int[] parties = new int[ward_ids.length];
        int[] votes = new int[ward_ids.length];
        for (int i = 0; i < ward_ids.length; i++) {
            int party = getParty(ward_ids[i], t);
            int pos = getPos(parties, party, length);

            if (pos == -1) {
                parties[length] = party;
                votes[length] = 1;
                length++;
            } else {
                parties[pos] = party;
                votes[pos]++;
            }
        }

        Party[] arr = new Party[length];
        for (int i = 0; i < length; i++)
            arr[i] = createParty(parties[i], votes[i]);

        return arr;
    }

    private int getParty(int ward_id, char t) throws SQLException {
        String sql = "";
        if (t == 'a')
            sql = "select p_id from has where votes <> 0 and ward_id = ? order by votes desc";
        else if (t == 'l')
            sql = "select p_id from has where votes <> 0 and ward_id = ? and is_dist = 0 order by votes desc";
        else if (t == 'd')
            sql = "select p_id from has where votes <> 0 and ward_id = ? and is_dist = 1 order by votes desc";
        
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setInt(1, ward_id);
        ResultSet results = stmt.executeQuery();
        results.next();
        return results.getInt(1);
    }

    private Party createParty(int p_id, int votes) throws SQLException {
        String sql = "select p_name, abbr from political_party where p_id = ?";
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setInt(1, p_id);
        ResultSet results = stmt.executeQuery();
        results.next();

        return new Party(results.getString(1), results.getString(2), votes);
    }

    private int getPos(int[] arr, int key, int length) {
        for (int i = 0; i < length; i++)
            if (arr[i] == key)
                return i;

        return -1;
    }

    private int getPos(String[] arr, String key, int length) {
        for (int i = 0; i < length; i++)
            if (arr[i].equals(key))
                return i;

        return -1;
    }
}