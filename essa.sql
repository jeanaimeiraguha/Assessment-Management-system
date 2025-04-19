
CREATE DATABASE IF NOT EXISTS ESSA;
USE ESSA;

CREATE TABLE User (
    User_Id INT AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(50),
    Password VARCHAR(255)
);

CREATE TABLE Trade (
    Trade_Id INT AUTO_INCREMENT PRIMARY KEY,
    Trade_Name VARCHAR(100)
);

CREATE TABLE Trainees (
    Trainee_Id INT AUTO_INCREMENT PRIMARY KEY,
    FirstNames VARCHAR(100),
    LastName VARCHAR(100),
    Gender VARCHAR(10),
    Trade_Id INT,
    FOREIGN KEY (Trade_Id) REFERENCES Trade(Trade_Id)
);

CREATE TABLE Marks (
    Trainee_Id INT,
    Trade_Id INT,
    Module_Name VARCHAR(100),
    Formative_Assessment INT,
    Summative_Assessment INT,
    Total_Marks INT,
    FOREIGN KEY (Trainee_Id) REFERENCES Trainees(Trainee_Id),
    FOREIGN KEY (Trade_Id) REFERENCES Trade(Trade_Id)
);

INSERT INTO User (UserName, Password) VALUES ('admin', 'admin123');
