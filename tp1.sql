CREATE TABLE train (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nametrain VARCHAR(255) NOT NULL,
    departure VARCHAR(255) NOT NULL,
    arrival VARCHAR(255) NOT NULL,
    duration INT
);

--1ier Enregistrement
INSERT INTO train (nametrain, departure, arrival, duration)
VALUES ('Express 1', 'Gare A', 'Gare B', 120);

--2ieme Enregistrement
INSERT INTO train (nametrain, departure, arrival, duration)
VALUES ('Rapide 2', 'Gare C', 'Gare D', 180);

--3ieme Enregistrement
INSERT INTO train (nametrain, departure, arrival, duration)
VALUES ('Local 3', 'Gare E', 'Gare F', 60);

--4ieme Enregistrement
INSERT INTO train (nametrain, departure, arrival, duration)
VALUES ('Transcontinental 4', 'Gare G', 'Gare H', 360);

--5ieme Enregistrement
INSERT INTO train (nametrain, departure, arrival, duration)
VALUES ('Métro 5', 'Gare I', 'Gare J', 30);