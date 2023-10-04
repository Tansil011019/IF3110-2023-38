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
-- Name: enum_user_role; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.enum_user_role AS ENUM (
    'ADMIN',
    'CUSTOMER'
);


ALTER TYPE public.enum_user_role OWNER TO postgres;

--
-- Name: check_admin_role_film_created_by(uuid); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.check_admin_role_film_created_by(created_by_param uuid) RETURNS boolean
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF EXISTS (SELECT 1 FROM "user" WHERE user_id = created_by_param AND user_role = 'ADMIN') THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
END;
$$;


ALTER FUNCTION public.check_admin_role_film_created_by(created_by_param uuid) OWNER TO postgres;

--
-- Name: check_admin_role_film_updated_by(uuid); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.check_admin_role_film_updated_by(updated_by_param uuid) RETURNS boolean
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF updated_by_param IS NULL OR EXISTS (SELECT 1 FROM "user" WHERE user_id = updated_by_param AND user_role = 'ADMIN') THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
END;
$$;


ALTER FUNCTION public.check_admin_role_film_updated_by(updated_by_param uuid) OWNER TO postgres;

--
-- Name: check_admin_role_schedule_created_by(uuid); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.check_admin_role_schedule_created_by(created_by_param uuid) RETURNS boolean
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF EXISTS (SELECT 1 FROM "user" WHERE user_id = created_by_param AND user_role = 'ADMIN') THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
END;
$$;


ALTER FUNCTION public.check_admin_role_schedule_created_by(created_by_param uuid) OWNER TO postgres;

--
-- Name: check_admin_role_schedule_updated_by(uuid); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.check_admin_role_schedule_updated_by(updated_by_param uuid) RETURNS boolean
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF updated_by_param IS NULL OR EXISTS (SELECT 1 FROM "user" WHERE user_id = updated_by_param AND user_role = 'ADMIN') THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
END;
$$;


ALTER FUNCTION public.check_admin_role_schedule_updated_by(updated_by_param uuid) OWNER TO postgres;

--
-- Name: check_admin_role_user_created_by(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.check_admin_role_user_created_by() RETURNS boolean
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF EXISTS (SELECT 1 FROM "user" WHERE user_id = NEW.created_by AND user_role = 'ADMIN') THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
END;
$$;


ALTER FUNCTION public.check_admin_role_user_created_by() OWNER TO postgres;

--
-- Name: check_admin_role_user_updated_by(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.check_admin_role_user_updated_by() RETURNS boolean
    LANGUAGE plpgsql
    AS $$
BEGIN
    IF EXISTS (SELECT 1 FROM "user" WHERE user_id = NEW.updated_by AND user_role = 'ADMIN') THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
END;
$$;


ALTER FUNCTION public.check_admin_role_user_updated_by() OWNER TO postgres;

--
-- Name: soft_delete_film(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.soft_delete_film() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.deleted_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.soft_delete_film() OWNER TO postgres;

--
-- Name: soft_delete_schedule(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.soft_delete_schedule() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.deleted_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.soft_delete_schedule() OWNER TO postgres;

--
-- Name: soft_delete_transaction(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.soft_delete_transaction() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.deleted_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.soft_delete_transaction() OWNER TO postgres;

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
-- Name: update_film_updated_at(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_film_updated_at() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.updated_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.update_film_updated_at() OWNER TO postgres;

--
-- Name: update_schedule_updated_at(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_schedule_updated_at() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.updated_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.update_schedule_updated_at() OWNER TO postgres;

--
-- Name: update_transaction_updated_at(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_transaction_updated_at() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	NEW.updated_at = current_timestamp;
	RETURN NEW;
END;
$$;


ALTER FUNCTION public.update_transaction_updated_at() OWNER TO postgres;

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
-- Name: film; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.film (
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone,
    deleted_at timestamp with time zone,
    film_id uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    title text,
    genre text,
    description text,
    age_restriction integer,
    duration integer,
    starting_date timestamp with time zone,
    end_date timestamp with time zone,
    trailer_url_youtube text,
    poster_url text,
    trailer_url text,
    created_by uuid NOT NULL,
    updated_by uuid,
    CONSTRAINT check_admin_role_film_created_by_constraint CHECK (public.check_admin_role_film_created_by(created_by)),
    CONSTRAINT check_admin_role_film_updated_by_constraint CHECK (public.check_admin_role_film_updated_by(updated_by)),
    CONSTRAINT film_age_restriction_check CHECK ((age_restriction >= 0)),
    CONSTRAINT film_duration_check CHECK ((duration >= 0))
);


ALTER TABLE public.film OWNER TO postgres;

--
-- Name: schedule; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.schedule (
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone,
    deleted_at timestamp with time zone,
    schedule_id uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    film_id uuid,
    price numeric(10,2),
    number_of_seats integer,
    created_by uuid NOT NULL,
    updated_by uuid,
    CONSTRAINT check_admin_role_schedule_created_by_constraint CHECK (public.check_admin_role_schedule_created_by(created_by)),
    CONSTRAINT check_admin_role_schedule_updated_by_constraint CHECK (public.check_admin_role_schedule_updated_by(updated_by)),
    CONSTRAINT schedule_number_of_seats_check CHECK ((number_of_seats >= 0))
);


ALTER TABLE public.schedule OWNER TO postgres;

--
-- Name: transaction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transaction (
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone,
    deleted_at timestamp with time zone,
    transaction_id uuid DEFAULT public.uuid_generate_v4() NOT NULL,
    schedule_id uuid,
    order_time timestamp with time zone,
    total_price numeric(10,2),
    created_by uuid NOT NULL,
    updated_by uuid
);


ALTER TABLE public.transaction OWNER TO postgres;

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
    updated_by uuid,
    user_role public.enum_user_role DEFAULT 'CUSTOMER'::public.enum_user_role NOT NULL
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Data for Name: film; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.film (created_at, updated_at, deleted_at, film_id, title, genre, description, age_restriction, duration, starting_date, end_date, trailer_url_youtube, poster_url, trailer_url, created_by, updated_by) FROM stdin;
2023-10-04 15:56:03.618306+00	\N	\N	47647d47-9c34-4631-b934-51e6a4a3d28f	Fast and Furious	Action	Dom defeat the enemy's family	12	120	2023-10-04 14:30:00+00	2023-11-04 14:30:00+00	\N	\N	\N	bfb22ef3-1da2-4160-b319-abffc62c0bbe	\N
\.


--
-- Data for Name: schedule; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.schedule (created_at, updated_at, deleted_at, schedule_id, film_id, price, number_of_seats, created_by, updated_by) FROM stdin;
2023-10-04 16:52:27.652607+00	\N	\N	e62b2b25-221b-409b-9733-1c5bde142031	47647d47-9c34-4631-b934-51e6a4a3d28f	100000.00	10	bfb22ef3-1da2-4160-b319-abffc62c0bbe	\N
\.


--
-- Data for Name: transaction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transaction (created_at, updated_at, deleted_at, transaction_id, schedule_id, order_time, total_price, created_by, updated_by) FROM stdin;
2023-10-04 17:06:26.623952+00	\N	\N	cfce03f9-278f-4e79-9d2e-7817f1dbe7bc	e62b2b25-221b-409b-9733-1c5bde142031	2023-10-04 14:30:00+00	300000.00	e9799416-371d-45ed-a881-1e8b744d4b64	\N
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (created_at, updated_at, deleted_at, user_id, name, password, created_by, updated_by, user_role) FROM stdin;
2023-09-28 05:21:40.401074+00	2023-10-04 12:04:13.086337+00	\N	bfb22ef3-1da2-4160-b319-abffc62c0bbe	test_name	test_pwd	bfb22ef3-1da2-4160-b319-abffc62c0bbe	\N	ADMIN
2023-09-28 05:22:37.44096+00	\N	2023-10-04 12:04:33.773923+00	e9799416-371d-45ed-a881-1e8b744d4b64	test_name_1	test_pwd	bfb22ef3-1da2-4160-b319-abffc62c0bbe	\N	CUSTOMER
\.


--
-- Name: film film_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_pkey PRIMARY KEY (film_id);


--
-- Name: schedule schedule_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedule
    ADD CONSTRAINT schedule_pkey PRIMARY KEY (schedule_id);


--
-- Name: transaction transaction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_pkey PRIMARY KEY (transaction_id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (user_id);


--
-- Name: film film_soft_delete_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER film_soft_delete_trigger BEFORE UPDATE ON public.film FOR EACH ROW WHEN ((new.deleted_at IS NOT NULL)) EXECUTE FUNCTION public.soft_delete_film();


--
-- Name: film film_updated_at_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER film_updated_at_trigger BEFORE UPDATE ON public.film FOR EACH ROW WHEN (((old.* IS DISTINCT FROM new.*) AND (new.deleted_at IS NULL))) EXECUTE FUNCTION public.update_film_updated_at();


--
-- Name: schedule schedule_soft_delete_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER schedule_soft_delete_trigger BEFORE UPDATE ON public.schedule FOR EACH ROW WHEN ((new.deleted_at IS NOT NULL)) EXECUTE FUNCTION public.soft_delete_schedule();


--
-- Name: schedule schedule_updated_at_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER schedule_updated_at_trigger BEFORE UPDATE ON public.schedule FOR EACH ROW WHEN (((old.* IS DISTINCT FROM new.*) AND (new.deleted_at IS NULL))) EXECUTE FUNCTION public.update_schedule_updated_at();


--
-- Name: transaction transaction_soft_delete_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER transaction_soft_delete_trigger BEFORE UPDATE ON public.transaction FOR EACH ROW WHEN ((new.deleted_at IS NOT NULL)) EXECUTE FUNCTION public.soft_delete_transaction();


--
-- Name: transaction transaction_updated_at_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER transaction_updated_at_trigger BEFORE UPDATE ON public.transaction FOR EACH ROW WHEN (((old.* IS DISTINCT FROM new.*) AND (new.deleted_at IS NULL))) EXECUTE FUNCTION public.update_transaction_updated_at();


--
-- Name: user user_soft_delete_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER user_soft_delete_trigger BEFORE UPDATE ON public."user" FOR EACH ROW WHEN ((new.deleted_at IS NOT NULL)) EXECUTE FUNCTION public.soft_delete_user();


--
-- Name: user user_updated_at_trigger; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER user_updated_at_trigger BEFORE UPDATE ON public."user" FOR EACH ROW WHEN (((old.* IS DISTINCT FROM new.*) AND (new.deleted_at IS NULL))) EXECUTE FUNCTION public.update_user_updated_at();


--
-- Name: film film_created_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_created_by_fkey FOREIGN KEY (created_by) REFERENCES public."user"(user_id);


--
-- Name: film film_updated_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_updated_by_fkey FOREIGN KEY (updated_by) REFERENCES public."user"(user_id);


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
-- Name: schedule schedule_created_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedule
    ADD CONSTRAINT schedule_created_by_fkey FOREIGN KEY (created_by) REFERENCES public."user"(user_id);


--
-- Name: schedule schedule_film_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedule
    ADD CONSTRAINT schedule_film_id_fkey FOREIGN KEY (film_id) REFERENCES public.film(film_id);


--
-- Name: schedule schedule_updated_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedule
    ADD CONSTRAINT schedule_updated_by_fkey FOREIGN KEY (updated_by) REFERENCES public."user"(user_id);


--
-- Name: transaction transaction_created_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_created_by_fkey FOREIGN KEY (created_by) REFERENCES public."user"(user_id);


--
-- Name: transaction transaction_schedule_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_schedule_id_fkey FOREIGN KEY (schedule_id) REFERENCES public.schedule(schedule_id);


--
-- Name: transaction transaction_updated_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_updated_by_fkey FOREIGN KEY (updated_by) REFERENCES public."user"(user_id);


--
-- PostgreSQL database dump complete
--

