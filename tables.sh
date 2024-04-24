mysql <<EOFMYSQL
use amnak;
show tables;

DROP TABLE Team; 
DROP TABLE Game; 
DROP TABLE Player; 

CREATE TABLE Team (
    TeamId INT AUTO_INCREMENT PRIMARY KEY,
    Location VARCHAR(50) NOT NULL,
    Nickname VARCHAR(50) NOT NULL,
    Conference VARCHAR(3) NOT NULL,
    Division VARCHAR(50) NOT NULL
);

CREATE TABLE Game (
    GameId INT AUTO_INCREMENT PRIMARY KEY,
    TeamId1 INT NOT NULL,
    TeamId2 INT NOT NULL,
    Score1 INT,
    Score2 INT,
    Date DATE,
    FOREIGN KEY (TeamId1) REFERENCES Team(TeamId) ON DELETE CASCADE,
    FOREIGN KEY (TeamId2) REFERENCES Team(TeamId) ON DELETE CASCADE
);

CREATE TABLE Player (
    PlayerId INT AUTO_INCREMENT PRIMARY KEY,
    TeamId INT NOT NULL,
    Name VARCHAR(100) NOT NULL,
    Position VARCHAR(50) NOT NULL,
    FOREIGN KEY (TeamId) REFERENCES Team(TeamId) ON DELETE CASCADE
);

INSERT INTO Team (Location, Nickname, Conference, Division) VALUES
    ('Kansas City', 'Chiefs', 'AFC', 'West'),
    ('Tampa Bay', 'Buccaneers', 'NFC', 'South'),
    ('New England', 'Patriots', 'AFC', 'East'),
    ('Green Bay', 'Packers', 'NFC', 'North');

INSERT INTO Game (TeamId1, TeamId2, Score1, Score2, Date) VALUES
    (1, 2, 31, 24, '2024-09-05'),
    (3, 4, 20, 17, '2024-09-06'),
    (2, 4, NULL, NULL, '2024-09-12'); 

INSERT INTO Player (TeamId, Name, Position) VALUES
    (1, 'Patrick Mahomes', 'Quarterback'),
    (2, 'Tom Brady', 'Quarterback'),
    (3, 'Mac Jones', 'Quarterback'),
    (4, 'Aaron Rodgers', 'Quarterback');


EOFMYSQL
