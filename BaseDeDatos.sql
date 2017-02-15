-- Database: "ISW"

-- DROP DATABASE "ISW";

CREATE DATABASE "ISW"
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'Spanish_Spain.1252'
       LC_CTYPE = 'Spanish_Spain.1252'
       CONNECTION LIMIT = -1;

- Table: public.asignaturas

-- DROP TABLE public.asignaturas;

CREATE TABLE public.asignaturas
(
  id_asignatura integer NOT NULL DEFAULT nextval('asignaturas_id_asignatura_seq'::regclass),
  nombre_asig character varying(50) NOT NULL,
  creditos integer,
  horas_dirig integer,
  horas_indiv integer,
  horas_auto integer,
  semestre integer,
  CONSTRAINT asignaturas_pkey PRIMARY KEY (id_asignatura)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.asignaturas
  OWNER TO postgres;

-- Table: public.carrera

-- DROP TABLE public.carrera;

CREATE TABLE public.carrera
(
  id_carrera integer NOT NULL DEFAULT nextval('carrera_id_carrera_seq'::regclass),
  nombre_carrera character varying(50),
  "año_ingreso" integer,
  CONSTRAINT carrera_pkey PRIMARY KEY (id_carrera)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.carrera
  OWNER TO postgres;

-- Table: public.contiene

-- DROP TABLE public.contiene;

CREATE TABLE public.contiene
(
  id_carrera integer,
  id_asignatura integer,
  CONSTRAINT contiene_id_asignatura_fkey FOREIGN KEY (id_asignatura)
      REFERENCES public.asignaturas (id_asignatura) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT contiene_id_carrera_fkey FOREIGN KEY (id_carrera)
      REFERENCES public.carrera (id_carrera) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.contiene
  OWNER TO postgres;

-- Table: public.correo

-- DROP TABLE public.correo;

CREATE TABLE public.correo
(
  id_correo integer NOT NULL DEFAULT nextval('correo_id_correo_seq'::regclass),
  correo_institucional character varying(50),
  correo_personal character varying(50),
  rut character varying(9),
  CONSTRAINT correo_pkey PRIMARY KEY (id_correo),
  CONSTRAINT correo_rut_fkey FOREIGN KEY (rut)
      REFERENCES public.estudiantes (rut) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.correo
  OWNER TO postgres;

-- Table: public.crea

-- DROP TABLE public.crea;

CREATE TABLE public.crea
(
  id_jefecarrera integer NOT NULL,
  id_solicitud integer NOT NULL,
  CONSTRAINT crea_pkey PRIMARY KEY (id_jefecarrera, id_solicitud),
  CONSTRAINT crea_id_jefecarrera_fkey FOREIGN KEY (id_jefecarrera)
      REFERENCES public.jefecarrera (id_jefecarrera) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT crea_id_solicitud_fkey FOREIGN KEY (id_solicitud)
      REFERENCES public.solicitudes (id_solicitud) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.crea
  OWNER TO postgres;

-- Table: public.cursan

-- DROP TABLE public.cursan;

CREATE TABLE public.cursan
(
  fecha_inicio date NOT NULL,
  fecha_termino date,
  nota real,
  rut character varying(9),
  id_asignatura integer,
  CONSTRAINT cursan_pkey PRIMARY KEY (fecha_inicio),
  CONSTRAINT cursan_id_asignatura_fkey FOREIGN KEY (id_asignatura)
      REFERENCES public.asignaturas (id_asignatura) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT cursan_rut_fkey FOREIGN KEY (rut)
      REFERENCES public.estudiantes (rut) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.cursan
  OWNER TO postgres;

- Table: public.direccion

-- DROP TABLE public.direccion;

CREATE TABLE public.direccion
(
  id_direccion integer NOT NULL DEFAULT nextval('direccion_id_direccion_seq'::regclass),
  calle character varying(30),
  numero integer,
  ciudad character varying(30),
  rut character varying(9),
  CONSTRAINT direccion_pkey PRIMARY KEY (id_direccion),
  CONSTRAINT direccion_rut_fkey FOREIGN KEY (rut)
      REFERENCES public.estudiantes (rut) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.direccion
  OWNER TO postgres;

- Table: public.direccion

-- DROP TABLE public.direccion;

CREATE TABLE public.direccion
(
  id_direccion integer NOT NULL DEFAULT nextval('direccion_id_direccion_seq'::regclass),
  calle character varying(30),
  numero integer,
  ciudad character varying(30),
  rut character varying(9),
  CONSTRAINT direccion_pkey PRIMARY KEY (id_direccion),
  CONSTRAINT direccion_rut_fkey FOREIGN KEY (rut)
      REFERENCES public.estudiantes (rut) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.direccion
  OWNER TO postgres;

-- Table: public.estudiante_n

-- DROP TABLE public.estudiante_n;

CREATE TABLE public.estudiante_n
(
  id_carrera integer NOT NULL,
  id_jefecarrera integer,
  CONSTRAINT estudiante_n_pkey PRIMARY KEY (id_carrera),
  CONSTRAINT estudiante_n_id_carrera_fkey FOREIGN KEY (id_carrera)
      REFERENCES public.carrera (id_carrera) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT estudiante_n_id_jefecarrera_fkey FOREIGN KEY (id_jefecarrera)
      REFERENCES public.jefecarrera (id_jefecarrera) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.estudiante_n
  OWNER TO postgres;

-- Table: public.estudiantes

-- DROP TABLE public.estudiantes;

CREATE TABLE public.estudiantes
(
  rut character varying(9) NOT NULL,
  nombre character varying(30),
  apellido character varying(30),
  fecha_nacimiento date,
  ctr character varying(20),
  id_carrera integer,
  id_usuario integer,
  id_estudiante integer DEFAULT nextval('estudiantes_id_estudiante'::regclass),
  CONSTRAINT estudiantes_pkey PRIMARY KEY (rut),
  CONSTRAINT estudiantes_id_carrera_fkey FOREIGN KEY (id_carrera)
      REFERENCES public.carrera (id_carrera) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT estudiantes_id_usuario_fkey FOREIGN KEY (id_usuario)
      REFERENCES public.usuario (id_usuario) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.estudiantes
  OWNER TO postgres;

-- Table: public.jefecarrera

-- DROP TABLE public.jefecarrera;

CREATE TABLE public.jefecarrera
(
  id_jefecarrera integer NOT NULL DEFAULT nextval('jefecarrera_id_jefecarrera_seq'::regclass),
  ctr character varying(20),
  correo character varying(30),
  id_usuario integer,
  nombre character varying(30),
  CONSTRAINT jefecarrera_pkey PRIMARY KEY (id_jefecarrera),
  CONSTRAINT jefecarrera_id_usuario_fkey FOREIGN KEY (id_usuario)
      REFERENCES public.usuario (id_usuario) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.jefecarrera
  OWNER TO postgres;

-- Table: public.solicita_inscripcion

-- DROP TABLE public.solicita_inscripcion;

CREATE TABLE public.solicita_inscripcion
(
  fecha date NOT NULL,
  id_jefecarrera integer NOT NULL,
  rut character varying(9) NOT NULL,
  id_asignatura integer NOT NULL,
  CONSTRAINT solicita_inscripcion_pkey PRIMARY KEY (fecha, id_jefecarrera, rut, id_asignatura),
  CONSTRAINT solicita_inscripcion_id_asignatura_fkey FOREIGN KEY (id_asignatura)
      REFERENCES public.asignaturas (id_asignatura) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT solicita_inscripcion_id_jefecarrera_fkey FOREIGN KEY (id_jefecarrera)
      REFERENCES public.jefecarrera (id_jefecarrera) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT solicita_inscripcion_rut_fkey FOREIGN KEY (rut)
      REFERENCES public.estudiantes (rut) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.solicita_inscripcion
  OWNER TO postgres;

-- Table: public.solicitudes

-- DROP TABLE public.solicitudes;

CREATE TABLE public.solicitudes
(
  id_solicitud integer NOT NULL DEFAULT nextval('solicitudes_id_solicitud_seq'::regclass),
  descripcion character varying(1000),
  rut character varying(9),
  fecha_inicio date,
  fecha_termino date,
  id_estado integer,
  id_tipo integer,
  id_asignatura integer,
  CONSTRAINT solicitudes_pkey PRIMARY KEY (id_solicitud)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.solicitudes
  OWNER TO postgres;

-- Table: public.telefono

-- DROP TABLE public.telefono;

CREATE TABLE public.telefono
(
  id_telefono integer NOT NULL DEFAULT nextval('telefono_id_telefono_seq'::regclass),
  numero_personal integer,
  numero_fijo integer,
  rut character varying(9),
  CONSTRAINT telefono_pkey PRIMARY KEY (id_telefono),
  CONSTRAINT telefono_rut_fkey FOREIGN KEY (rut)
      REFERENCES public.estudiantes (rut) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.telefono
  OWNER TO postgres;

-- Table: public.tipo_solicitud

-- DROP TABLE public.tipo_solicitud;

CREATE TABLE public.tipo_solicitud
(
  id_tipo integer NOT NULL DEFAULT nextval('tipo_solicitud_id_tipo_seq'::regclass),
  tipo_solicitud character varying(20),
  CONSTRAINT tipo_solicitud_pkey PRIMARY KEY (id_tipo)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.tipo_solicitud
  OWNER TO postgres;

-- Table: public.usuario

-- DROP TABLE public.usuario;

CREATE TABLE public.usuario
(
  id_usuario integer NOT NULL DEFAULT nextval('usuario_id_usuario_seq'::regclass),
  tipo_usuario character varying(20),
  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.usuario
  OWNER TO postgres;
