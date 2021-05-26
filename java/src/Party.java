public class Party {
    String name;
    String abb;
    int votes;

    public Party() {
        name = "";
        abb = "";
        votes = 0;
    }

    public Party(String _name, String _abb, int _votes) {
        name = _name.replaceAll(" ", "");
        abb = _abb;
        votes = _votes;
    }

    public void addVote() {votes++;}
}
