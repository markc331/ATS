CREATE TABLE position (
    pid INTEGER AUTO_INCREMENT,
    title VARCHAR(100),
    type VARCHAR(20),
    level VARCHAR(20),
    wlocation VARCHAR(20),
    location VARCHAR(20),
    sshift VARCHAR(20),
    eshift VARCHAR(20),
    sday VARCHAR(20),
    eday VARCHAR(20),
    min VARCHAR(20),
    max VARCHAR(20),
    description VARCHAR(500),
    time TIME,
    date DATE,
    PRIMARY KEY(pid));

CREATE TABLE benefits (
    bid  INTEGER AUTO_INCREMENT,
    pid INTEGER,
    benefit VARCHAR(250),
    PRIMARY KEY(bid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);

CREATE TABLE requirments (
    reqid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    requirment VARCHAR(250),
    PRIMARY KEY(reqid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);

CREATE TABLE qualifications (
    qid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    qualification VARCHAR(250),
    PRIMARY KEY(qid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);
    
CREATE TABLE skills (
    sid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    skill VARCHAR(250),
    PRIMARY KEY(sid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);

CREATE TABLE responsibilities (
    respid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    responsibility VARCHAR(250),
    PRIMARY KEY(respid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);

CREATE TABLE travel (
    tid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    travel VARCHAR(250),
    PRIMARY KEY(tid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);

CREATE TABLE clearance (
    cid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    clearance VARCHAR(250),
    PRIMARY KEY(cid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);

CREATE TABLE phys (
    physid INTEGER AUTO_INCREMENT,
    pid INTEGER,
    phys_req VARCHAR(250),
    PRIMARY KEY(physid, pid),
    FOREIGN KEY(pid) REFERENCES position (pid) ON DELETE CASCADE);