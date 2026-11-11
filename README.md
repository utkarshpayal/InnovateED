# InnovateED
![image](https://user-images.githubusercontent.com/104209135/230834254-85d1c31b-ea02-44a4-87e8-471d18546b1c.png)

## Rajasthan IT Day Hackathon Submission

**Team Name:** BarnStormers

**Members:** Utkarsh Payal, Manjeet Agarwal, Suryaansh Singh, Deepak Panwar, Praveen Saini

This is a working prototype of InnovateEd, our submission for the IT Day Hackathon. You can install it yourself or view it live here: https://pingmetrix.com/

### Progressive Web App

Our application is also available as a Mobile web app, just open https://pingmetrix.com/ on Chrome, click on the three dots on the top menu and click on **Install App**. (The PWA files are `InnovateEd-main/manifest.json` and `InnovateEd-main/service-worker.js`.)

![image](https://user-images.githubusercontent.com/104209135/230834363-d2cdd46d-361a-4e93-8077-c142a7769975.png)

> **Problem Statement:** Develop a solution to boost the interest of K-12 students in Innovation and STEM education in India using AI

## Project Description

Our solution is aimed at K-12 students and focuses on boosting their innovation by providing byte-sized information cards.

The focus time span of the young generation is very low right now as they scroll endlessly on social media platforms like Instagram and Twitter. Our solution smartly resembles these platforms and targets their short attention span.

We present the user with endless bite-sized information cards tailored to their needs and easy to grasp and understand.

Our cards contain data about the Latest Innovations, Popular Innovations, and AI Innovations.

### Byte Size Cards
We present science and technology information in byte-sized cards that are easy to understand.

### To Draw Inspiration
Draw inspiration for your innovations by looking at what other people are building.

### For STEM Learning
Cards stimulate students' interest, developing their problem-solving ability and critical thinking skills.

These cards boost innovation in K-12 students as they see what people have invented and what they are inventing now. At their age, the curiosity level of children is higher than at any other time in their life.

## How do we achieve Innovation in STEM?

We have three parent categories: Latest Innovation, Popular Innovation, AI Innovation, and multiple sub-categories.

We learn about the user through their interaction with cards and use generative AI technology called ChatGPT/GPT-turbo-3.5 to predict their behavior and find out what they like.

#### ChatGPT Prompt Used For this

> Prompt: Given the post likes and dislikes of a user for the past period, predict what the user will like to read from the given liked [homes,ai,forest,trees,history]and disliked [car,truck,bus,soil] post category only. Answer only in one word of the category that the user will be like to read about, . Do not answer outside of the categories.The available category in my database [ food, health, agriculture, technology, AI, automotive, social media, aerospace, energy, management, entertainment] .Answer in one word only.
>
> Analyzed Answer: environment and forest (in 2nd run)

We can then use this data to show the user personalized cards and tailor content to them. Their likes/dislikes are calculated based on their interaction on the website.

## Where do we get data from?

All of our data is collected manually or with the help of tools from authentic sources, such as [Open Government Data](https://data.gov.in) and Harvard OTD.

## LIMITATION

Since it is only a prototype and we are bound by the costs of OpenAI API, we have not integrated the AI system. The code in this repository does not call any AI API.

## What's in the app

All application code lives in the [`InnovateEd-main/`](InnovateEd-main) folder:

| File / folder | Purpose |
| ------------- | ------- |
| `index.php` | Home page: intro plus "Latest Innovation", "Popular Innovation" and "AI Innovation" card rows |
| `latest-innovation.php`, `Popular-innovation.php`, `AI-innovation.php` | Card feeds per category |
| `Our-mission.php` | Mission page |
| `search.php` | Search across card title, description and category |
| `account/login.php`, `account/PPinsert.php`, `account/includes/` | User login/registration module and its first-run database setup |
| `includes/` | Shared header, footer, search bar and `sql.php` (MySQL connection) |
| `patents_innovation_cards.sql` | MySQL dump of the `innovation_cards` table (card data) |
| `manifest.json`, `service-worker.js` | Progressive Web App files |
| `assets/` | Images and stylesheets |

## Tech stack

- PHP 8.1 (with the `mysqli` extension)
- MySQL
- Apache2 / Nginx
- HTML, CSS (Bootstrap classes), JavaScript

## Installation

Please follow the steps given below to install InnovateEd on your local system.

Requirements:

1. MySQL Server
2. PHP 8.1
3. Apache2 / Nginx

Basically a LAMP stack.

Steps:

1. Clone the repository and place the **contents of the `InnovateEd-main/` folder** inside your web server's document root (the login setup writes `includes/sql.php` relative to the document root).

   ```sh
   git clone https://github.com/utkarshpayal/InnovateED.git
   ```

2. Create a MySQL database named `patents` and import the card data from `patents_innovation_cards.sql`, for example:

   ```sh
   mysql -u <user> -p patents < patents_innovation_cards.sql
   ```

3. Edit `includes/sql.php` and fill in your MySQL server details (`$servername`, `$username`, `$password`, `$dbname`). Do not commit real credentials.

4. Open `<yourdomain.com>/account/login.php`. If the login module is not configured yet, a setup page (`account/PPinsert.php`) asks for the MySQL details again, creates the `ph_BigPP` users table and writes `includes/sql.php`. This step is required for the login module to work.

The installation is complete, and it will run on your system now. If you do not follow the instructions carefully and set up MySQL properly, you will encounter a 500 Server Error.

There are no automated tests or build steps.

## License

Licensed under the Apache License 2.0 – see [LICENSE](LICENSE).
