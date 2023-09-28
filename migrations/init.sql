--
-- PostgreSQL database dump
--

-- Dumped from database version 16.0 (Debian 16.0-1.pgdg120+1)
-- Dumped by pg_dump version 16.0 (Debian 16.0-1.pgdg120+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


--
-- Name: soft_delete_user(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.soft_delete_user() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.deleted_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.soft_delete_user() OWNER TO postgres;

--
-- Name: update_user_updated_at(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_user_updated_at() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.updated_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.update_user_updated_at() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."user" (
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone,
    deleted_at timestamp with time zone,
    user_id uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    name character varying(100),
    password text,
    created_by uuid NOT NULL,
    updated_by uuid
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (created_at, updated_at, deleted_at, user_id, name, password, created_by, updated_by) FROM stdin;
2023-09-28 05:21:40.401074+00	2023-09-28 05:21:51.086338+00	\N	bfb22ef3-1da2-4160-b319-abffc62c0bbe	test_name	test_pwd	bfb22ef3-1da2-4160-b319-abffc62c0bbe	\N
2023-09-28 05:22:37.44096+00	\N	2023-09-28 05:25:01.300508+00	e9799416-371d-45ed-a881-1e8b744d4b64	test_name_1	test_pwd	bfb22ef3-1da2-4160-b319-abffc62c0bbe	\N
\.


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (user_id);


--
-- Name: user user_soft_delete_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER user_soft_delete_trigger BEFORE UPDATE ON public."user" FOR EACH ROW WHEN ((new.deleted_at IS NOT NULL)) EXECUTE FUNCTION public.soft_delete_user();


--
-- Name: user user_updated_at_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER user_updated_at_trigger BEFORE UPDATE ON public."user" FOR EACH ROW WHEN (((old.* IS DISTINCT FROM new.*) AND (new.deleted_at IS NULL))) EXECUTE FUNCTION public.update_user_updated_at();


--
-- Name: user fk_created_by; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT fk_created_by FOREIGN KEY (created_by) REFERENCES public."user"(user_id);


--
-- Name: user fk_updated_by; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT fk_updated_by FOREIGN KEY (updated_by) REFERENCES public."user"(user_id);


--
-- PostgreSQL database dump complete
--

