CREATE TABLE applicant ( 
    aid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    resume BLOB,
    fname VARCHAR(50),
    mname VARCHAR(50),
    lname VARCHAR(50),
    email VARCHAR(100),
    ptype VARCHAR(20),
    pnumber VARCHAR(20),
    linkedin VARCHAR(100),
    status VARCHAR(50),
    date DATE,
    time TIME,
    PRIMARY KEY(aid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);


CREATE TABLE experience (
    expid INTEGER AUTO_INCREMENT,
    aid INTEGER,
    cname VARCHAR(100),
    title VARCHAR(100),
    sdate DATE,
    edate DATE,
    description VARCHAR(500),
    PRIMARY KEY(expid, aid),
    FOREIGN KEY(aid) REFERENCES applicant (aid) ON DELETE CASCADE);

CREATE TABLE education ( 
    eduid INTEGER AUTO_INCREMENT,
    aid INTEGER,
    ename VARCHAR(100),
    degree VARCHAR(100),
    fos VARCHAR(100),
    syear INTEGER,
    gyear INTEGER,
    PRIMARY KEY(eduid, aid),
    FOREIGN KEY(aid) REFERENCES applicant (aid) ON DELETE CASCADE);

CREATE TABLE website (
    wid INTEGER AUTO_INCREMENT,
    aid INTEGER,
    site VARCHAR(100),
    PRIMARY KEY(wid, aid),
    FOREIGN KEY(aid) REFERENCES applicant(aid) ON DELETE CASCADE);

Drop TABLE website;
Drop TABLE education;
Drop TABLE experience;
Drop TABLE applicant;