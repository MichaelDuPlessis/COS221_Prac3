public class Node {
    // id's
    int munID, localID, metroID;
    boolean isMetro;
    Party[] parties, districParties;
    Candidate[] candidates;
    String munName;

    public Node(String _munName, int _munID, int _localID, Party[] _parties, Party[] _districtParties, Candidate[] _candidates) {
        munName = _munName;
        munID = _munID;
        localID = _localID;
        parties = _parties;
        districParties = _districtParties;
        candidates = _candidates;
        isMetro = false;
    }

    public Node(String _munName, int _munID, int _metroID, Party[] _parties, Candidate[] _candidates) {
        munName = _munName;
        munID = _munID;
        metroID = _munID;
        parties = _parties;
        candidates = _candidates;
        isMetro = true;
    }

    public int getPartyTotal() {
        int total = 0;
        for (int i = 0; i < parties.length;i ++)
            total += parties[i].votes;

        return total;
    }

    public Candidate getCandidateWinner() {
        int max = candidates[0].votes;
        int pos = 0;
        for (int i = 1; i < candidates.length; i++)
            if (max < candidates[i].votes) {
                max = candidates[i].votes;
                pos = i;
            }

        return candidates[pos];
    }
}
