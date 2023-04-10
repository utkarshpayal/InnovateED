# InnovateED

Rajasthan IT Day Hackathon Submission

Team Name: BarnStormers

Members: Manjeet Agarwal,Suryaansh Singh, Utkarsh Payal, Deepak Panwar, Praveen Saini
InnovateEd

This is a working prototype of InnovateEd, our submission for the IT Day Hackathon. You can install it yourself or view it live here: https://pingmetrix.com/
Prograssive Web App

Our application is also available as a Mobile web app, just open https://pingmetrix.com/ on chrome click on the three dots on top menu and click on Install App.

WhatsApp Image 2023-03-21 at 09 15 55

Problem Statement: Develop a solution to boost the interest of K-12 students in Innovation and STEM education in India using AI

Project Description

Our solution is aimed at K-12 students and focuses on boosting their innovation by providing byte-sized information cards.

The focus time span of young generation is very low right now as they scroll endlessly on social media platforms like Instagram and Twitter. Our solution smartly resembles these platforms and targets their short-attention spam.

We present the user with endless bit-sized information cards tailored to their needs and easy to grasp and understand.

Our cards contain data about the Latest Innovations, Popular Innovations, and AI Innovations.
Byte Size Cards

We present science and technology information in byte-sized cards that are easy to understand.
To Draw Inspiration

Draw inspiration for your innovations by looking at what other people are building.
For STEM Learning

Cards Stimulate students' interest, developing their problem-solving ability and critical thinking skills.

These cards boost innovation in K-12 students as they see what people have invented and what they are inventing now. At their age, the curiosity level of children is higher than at any other time in their life.
How do we achieve Innovation in STEM?

We have three parent categories: Latest Innovation, Popular Innovation, AI Innovation. and multiple sub-categories.

We learn about the user through their interaction with cards and use generative AI technology called ChatGPT/GPT-turbo-3.5 to predict their behavior and find out what they like.
ChatGPT Prompt Used For this

Prompt: Given the post likes and dislikes of a user for the past period, predict what the user will like to read from the given liked [homes,ai,forest,trees,history]and disliked [car,truck,bus,soil] post category only. Answer only in one word of the category that the user will be like to read about, . Do not answer outside of the categories.The available category in my database [ food, health, agriculture, technology, AI, automotive, social media, aerospace, energy, management, entertainment] .Answer in one word only.

Analyzed Answer: environment and forest (in 2nd run)

We can then use this data to show the user personalized cards and tailor content to them. Their likes/dislikes are calculated based on their interaction on the website.
Where do we get data from?

All of our data is collected manually or with the help of tools from authentic sources, such as Open Government Data[https://data.gov.in] and Harvard OTD.
LIMITATION

Since it is only a prototype and we are bound by the costs of OpenAI API, we have not integrated AI system.
Installation

Please follow the steps given below to install InnovateEd on your local system:

Requirements:

    Mysql Server
    PHP 8.1
    Apache2 / Nginx

Basically LAMP Stack

Steps:

    Clone the repository on your local system and place files inside your server root

git clone https://github.com/supersuryaansh/InnovateEd.git

    In the project files, edit the includes/sql.php file and fill it with your Mysql server details

    Now go to the following path and fill mysql details again. This step is required for our Login module to work.

<yourdomain.com>/account/login.php

An installation script will guide you and help you to setup the sql.php file for our user registration system.

    The name of our database is patents, import it into your mysql the DB is available in the cloned files itself.

The installation is complete, and it will run on your system now. If you do not follow the instructions clearly and setup mysql properly then you will encounter 500 Server Error.
