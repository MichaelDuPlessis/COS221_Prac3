import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.sql.SQLException;

public class XML {
    public static void main(String[] args) throws IOException, SQLException {
        Database db = new Database();
        Node[] nodes = db.getNodes();
        createDocument(nodes);
    }

    private static void createDocument(Node[] nodes) throws IOException {
        final String fileName = "results.xml";
        File file = new File(fileName);
        file.createNewFile();

        FileWriter writer = new FileWriter(file);
        String body = "";
        writer.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");

        // generate body
        for (int i = 0; i < nodes.length; i++) {
            String mun = "";

            // add parties and their majority control
            if (nodes[i].isMetro) {
                String partyTags = "";
                Party[] parties = nodes[i].parties;
                for (int j = 0; j < parties.length; j++)
                    partyTags += generateTag(parties[j].name, "", "control", String.valueOf((float)parties[j].votes/(float)nodes[i].getPartyTotal()));
                mun += generateTag("Parties", partyTags);
            } else {
                String partyLTags = "";
                Party[] lparties = nodes[i].parties;
                for (int j = 0; j < lparties.length; j++)
                    partyLTags += generateTag(lparties[j].name, "", "control", String.valueOf((float)lparties[j].votes/(float)nodes[i].getPartyTotal()));
                mun += generateTag("Local Parties", partyLTags);

                String partyDTags = "";
                Party[] dparties = nodes[i].parties;
                for (int j = 0; j < dparties.length; j++)
                    partyDTags += generateTag(dparties[j].name, "", "control", String.valueOf((float)dparties[j].votes/(float)nodes[i].getPartyTotal()));
                mun += generateTag("Local Parties", partyDTags);
            }

            // add candidates
            Candidate winner = nodes[i].getCandidateWinner();
            mun += generateTag("candidate", winner.fname + " " + winner.fname);

            body += generateTag("muncipality", mun, "name", nodes[i].munName + "(" + nodes[i].munID + ")");

            break; //remove this
        }

        writer.write(generateTag("municipalities", body));
        writer.close();
    }

    private static String generateTag(String tag, String data) {
        return "<"+tag+">\n" + data + "\n</" + tag + ">";
    }
    private static String generateTag(String tag, String data, String attrName, String attr) {
        return "<"+tag+" " + attrName + "=\"" + attr + "\">\n" + data + "\n</" + tag + ">";
    }
}
