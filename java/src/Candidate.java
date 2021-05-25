public class Candidate {
    String fname, lname;
    int votes;

    public Candidate() {
        fname = "";
        lname = "";
        votes = 0;
    }

    public Candidate(String _fname, String _lname, int _votes) {
        fname = _fname;
        lname = _lname;
        votes = _votes;
    }

    public void addVote() {votes++;}

    public String getFullName() {return fname + " " + lname;}
}
