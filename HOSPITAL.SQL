CREATE TABLE Clinicas (
    clinica_id SERIAL PRIMARY KEY NOT NULL,
    cli_nombre_clinica VARCHAR(100) NOT NULL,
    cli_ubicacion VARCHAR(100) NOT NULL,
    cli_telefono VARCHAR(15) NOT NULL
);

CREATE TABLE Medicos (
    medico_id SERIAL PRIMARY KEY NOT NULL,
    med_nombre1 VARCHAR(50) NOT NULL,
    med_nombre2 VARCHAR(50) NOT NULL,
    med_apellido1 VARCHAR(50) NOT NULL,
    med_apellido2 VARCHAR(50) NOT NULL,
    med_especialidad VARCHAR(50) NOT NULL,
    clinica_id INT,
    FOREIGN KEY (clinica_id) REFERENCES Clinicas(clinica_id)
);

CREATE TABLE Pacientes (
    paciente_id SERIAL PRIMARY KEY NOT NULL,
    pac_nombre1 VARCHAR(50) NOT NULL,
    pac_nombre2 VARCHAR(50) NOT NULL,
    pac_apellido1 VARCHAR(50) NOT NULL,
    pac_apellido2 VARCHAR(50) NOT NULL,
    pac_dpi VARCHAR (50) NOT NULL,
    pac_sexo VARCHAR(10) NOT NULL,
    pac_referido VARCHAR (10) NOT NULL,
    paciente_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Citas (
    cita_id SERIAL PRIMARY KEY NOT NULL, 
    cit_fecha DATE NOT NULL, 
    cit_hora VARCHAR NOT NULL, 
    paciente_id INT, 
    medico_id INT,
    clinica_id INT, 
    FOREIGN KEY (paciente_id) REFERENCES Pacientes(paciente_id), 
    FOREIGN KEY (medico_id) REFERENCES Medicos(medico_id), 
    FOREIGN KEY (clinica_id) REFERENCES Clinicas(clinica_id) 
);
