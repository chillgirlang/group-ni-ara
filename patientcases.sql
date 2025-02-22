CREATE DATABASE dashboard_db;
USE dashboard_db;

CREATE TABLE Patient_Cases (
    Case_ID INT AUTO_INCREMENT PRIMARY KEY,
    Case_Number VARCHAR(50) UNIQUE NOT NULL,
    Diagnosis TEXT NOT NULL,
    Symptoms TEXT NOT NULL,
    Treatment_Plan TEXT,
    Case_Status ENUM('Open', 'In Progress', 'Closed') DEFAULT 'Open',
    Admission_Date DATE NOT NULL,
    Discharge_Date DATE
);

INSERT INTO Patient_Cases (Case_Number, Diagnosis, Symptoms, Treatment_Plan, Case_Status, Admission_Date, Discharge_Date)
VALUES 
('C001', 'Flu', 'Fever, Cough', 'Rest, Hydration, Medication', 'Closed', '2025-02-10', '2025-02-15'),
('C002', 'Migraine', 'Headache, Sensitivity to Light', 'Painkillers, Rest', 'Open', '2025-02-18', NULL);