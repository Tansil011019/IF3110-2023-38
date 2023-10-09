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
    poster_url text DEFAULT '/public/images/bookin-default-movie-img.svg'::text,
    trailer_url text,
    created_by uuid NOT NULL,
    updated_by uuid,
    thumbnail_url text DEFAULT '/public/images/bookin-default-carousel-img.svg'::text,
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
    created_by uuid,
    updated_by uuid,
    user_role public.enum_user_role DEFAULT 'CUSTOMER'::public.enum_user_role NOT NULL,
    email text NOT NULL
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Data for Name: film; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.film (created_at, updated_at, deleted_at, film_id, title, genre, description, age_restriction, duration, starting_date, end_date, trailer_url_youtube, poster_url, trailer_url, created_by, updated_by, thumbnail_url) FROM stdin;
2023-10-06 09:48:09.542171+00	2023-10-06 15:34:38.117243+00	\N	4ccd3b3b-6607-44da-a96e-2f601bc8273f	URI	Action	The Surgical Strike	20	200	2023-10-20 14:30:00+00	2023-11-04 14:30:00+00	https://www.youtube.com/watch?v=VVY3do673Zc	/public/images/bookin-default-movie-img.svg	/public/videos/URI _ Official Trailer _ Vicky Kaushal, Yami Gautam, Paresh Rawal _ Aditya Dhar _ 11th Jan 2019.mp4	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	/public/images/bookin-uri-thumbnail-img.svg
2023-10-06 09:48:09.502536+00	2023-10-06 13:51:11.633638+00	\N	444e3653-1fc3-484f-bfe8-ea60eaac5b3a	Black Panther	Action	Wakanda Forever	12	120	2023-10-04 14:30:00+00	2023-11-04 14:30:00+00	https://www.youtube.com/watch?v=_Z3QKkl1WyM	/public/images/bookin-default-movie-img.svg	/public/videos/Marvel Studios’ Black Panther_ Wakanda Forever _ Official Trailer.mp4	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	/public/images/bookin-black-panther-thumbnail-img.svg
2023-10-06 09:48:09.528117+00	2023-10-06 13:51:11.652829+00	\N	dda6be22-f403-4188-a40a-927e3db2c31b	Zombie Land	Thriller	Terminate zombie	12	120	2023-10-04 14:30:00+00	2023-11-04 14:30:00+00	https://www.youtube.com/watch?v=ZlW9yhUKlkQ	/public/images/bookin-default-movie-img.svg	/public/videos/ZOMBIELAND_ DOUBLE TAP - Official Trailer (HD).mp4	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	/public/images/bookin-zombieland-thumbnail-img.svg
2023-10-06 09:48:09.557651+00	2023-10-06 13:51:11.67261+00	\N	693d3fec-3787-487a-9537-8c66b97d48ba	Spider-Man	Action	Across The Spider Verse	12	120	2023-10-04 14:30:00+00	2023-10-05 14:30:00+00	https://www.youtube.com/watch?v=shW9i6k8cB0	/public/images/bookin-default-movie-img.svg	/public/videos/SPIDER-MAN_ ACROSS THE SPIDER-VERSE - Official Trailer #2 (HD).mp4	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	/public/images/bookin-spiderman-thumbnail-img.svg
2023-10-05 02:06:33.614009+00	2023-10-06 15:27:56.551742+00	\N	d42ad796-7301-4336-b7c9-8a8e8bc85872	Fast and Furious	Action	Dom defeat the enemy's family	16	120	2023-10-04 14:30:00+00	2023-11-04 14:30:00+00	https://www.youtube.com/watch?v=32RAq6JzY-w	/public/images/bookin-default-movie-img.svg	/public/videos/FAST X _ Official Trailer.mp4	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	/public/images/bookin-default-carousel-img.svg
\.


--
-- Data for Name: schedule; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.schedule (created_at, updated_at, deleted_at, schedule_id, film_id, price, number_of_seats, created_by, updated_by) FROM stdin;
2023-10-05 02:07:43.924644+00	\N	\N	9beb9e80-2e42-47e1-ac0a-ba1f00fa0a62	d42ad796-7301-4336-b7c9-8a8e8bc85872	100000.00	10	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	\N
\.


--
-- Data for Name: transaction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transaction (created_at, updated_at, deleted_at, transaction_id, schedule_id, order_time, total_price, created_by, updated_by) FROM stdin;
2023-10-05 02:08:45.309688+00	\N	\N	f381bf7f-a8bb-4754-86f3-5a3ac0ea28e5	9beb9e80-2e42-47e1-ac0a-ba1f00fa0a62	2023-10-04 14:30:00+00	300000.00	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	\N
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (created_at, updated_at, deleted_at, user_id, name, password, created_by, updated_by, user_role, email) FROM stdin;
2023-10-07 06:29:52.755623+00	\N	\N	29167db5-2f17-4727-aa7d-1ddad5b44fc0	test_customer	$2y$10$Bxiffwtd76AV2wC/suRUk.geAsvjPFk0RPTWqQ0xe2CiMVM4X2J6G	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	\N	CUSTOMER	customer@gmail.com
2023-10-05 02:04:25.310758+00	2023-10-07 06:31:01.518689+00	\N	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	test_name	$2y$10$iCF4Y00ZP0m91M.CThYcL.nfatGx4XX3/DulNRdSVB.J5vP.Tnbz2	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	d21be2d3-e2d6-4ad4-89a4-15e2fe49d427	ADMIN	admin@gmail.com
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

