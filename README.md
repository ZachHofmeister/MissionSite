# MissionSite

MissionSite is a newsletter web app that I built to share monthly updates as a missionary with [FOCUS](https://focus.org) (The Fellowship of Catholic University Students). FOCUS missionaries serve in 200+ college campuses across the US, bringing the good news of the love of Jesus Christ and His Church to people in desparate need of love, hope, and faith.

You can find the site live at [zachhofmeister.com](https://zachhofmeister.com), or you can build it yourself with Docker.

<a href="https://zachhofmeister.com"><img width=75% alt="home" src="https://github.com/user-attachments/assets/7ffc13f7-3023-4fdd-9ac1-9fd313f165d8" /></a>

## How to Deploy

The easiest way to run the app yourself is with [Docker Compose](https://www.docker.com/get-started/). On MacOS or Linux, you can start the site by running the following:

```bash
# Clone the repo and change to its directory
git clone https://github.com/ZachHofmeister/MissionSite.git
cd MissionSite

# Make a copy of the example env file. You don't need to edit it if you are just trying it out.
cp EXAMPLE.env .env

# Start the containers
docker compose up -d --build
```

You can find the site in your browser at http://localhost:8080, and the PHPMyAdmin interface at http://localhost:8081. Or, you can expose the site to the internet securely with Cloudflare!

### Cloudflare Tunnel Setup (optional)

I use [Cloudflare's free tunnel service](https://developers.cloudflare.com/cloudflare-one/networks/connectors/cloudflare-tunnel/) to expose my site to the internet without poking holes in my firewall. If you want to set one up too, put a tunnel token in the `.env` file, uncomment `COMPOSE_PROFILES=tunnel`, and then run `docker compose up -d --build` again.

In the Cloudflare dashboard, point the tunnel to http://apache:80, which is the location of the site as the Cloudflare service sees it.

## Purpose
In my time as a campus missionary, I wanted to keep learning full-stack development in my free time. I had an idea that I could make a website that displays pages in US Letter format (8.5x11in), so that I could send them digitally or on paper. I got a lot of positive feedback from mission partners that they loved clicking on a photo to see it fullscreen, and that I can link to spiritual resources and Bible passages!

## Architecture
My original design for the website was just static HTML, CSS, and a little Javascript. That worked for a little while, but I was more interested in building a backend for the site. So, I converted the site to PHP and created a MariaDB database to store information on the newsletters.

I concluded my time with FOCUS after 3 years of mission, but I've still worked on the site as a fun project. Recently, I wanted to move the site to a different server, which let to me containerizing the whole site with Docker. I think it's really cool that I can move the whole site with about 3 commands!

## Possible Future Features
I've thought at some points that it would be cool to make this completely modular or a wordpress template or something, so that other missionaries could build and send their own interactive newsletters. Here are some of the ideas that I'm most interested in adding as I progress to that possibility:

* Creating / integrating a newsletter builder, so I don't have to code the newsletters in HTML in an editor. In the Users branch you can store newsletter HTML in the database rather than hardcoded files, but you are still writing HTML.
* Adding videos
* Adding a comment section
* Adding a way to sign up for notifications

<a href="https://zachhofmeister.com/newsletter.php?date=2025-02"><img width=75% alt="newsletter" src="https://github.com/user-attachments/assets/a001b0db-0d3f-4ba5-a30b-5a00925102de" /></a>
