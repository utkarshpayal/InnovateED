Problem Statement
The problem we aim to address is the lack of interest and engagement of K-12 students in Innovation and STEM education. To tackle this challenge, we are developing a solution that leverages AI to boost students' interest and inspire their innovation in India.

Project Description
Our solution focuses on providing K-12 students with a platform that offers byte-sized information cards. These cards are designed to capture the attention of students with short attention spans, resembling the popular social media platforms they are familiar with, such as Instagram and Twitter.

The core features of our solution are as follows:

Byte-sized Information: We present science and technology information in bite-sized cards that are easy to understand and digest.

Inspiration for Innovation: Students can draw inspiration for their own innovations by exploring what others have built and accomplished.

STEM Learning: The cards stimulate students' interest in STEM subjects, fostering their problem-solving abilities and critical thinking skills.

By showcasing the latest innovations, popular innovations, and AI innovations, our solution aims to ignite the spark of curiosity and creativity in K-12 students. We believe that at this stage of their lives, children possess a heightened level of curiosity, making it an opportune time to nurture their interest in STEM fields.

Achieving Innovation in STEM
To facilitate innovation in STEM education, our solution is structured around three parent categories: Latest Innovation, Popular Innovation, and AI Innovation. These parent categories further include various sub-categories.

We leverage the power of generative AI technology called ChatGPT/GPT-turbo-3.5 to predict user preferences based on their interaction with the cards. Through a prompt using the ChatGPT model, users are asked to predict the category they would like to read about, given their past likes and dislikes. The available categories in our database include food, health, agriculture, technology, AI, automotive, social media, aerospace, energy, management, and entertainment. The model provides a one-word answer within these categories to cater to the user's interests.

Data Collection
We ensure that all the data used in our solution is collected manually or through reliable tools from authentic sources, such as Open Government Data (https://data.gov.in) and Harvard OTD. This ensures the credibility and accuracy of the information presented to the students.

Limitations
As our solution is currently in the prototype stage, we have not fully integrated the AI system due to the constraints of the OpenAI API costs. However, we are actively working towards further enhancements and scalability.

Installation
To install and run our solution locally, please follow the steps below:

Requirements:
MySQL Server
PHP 8.1
Apache2 / Nginx (LAMP Stack)
Installation Steps:
Clone the repository onto your local system and place the files inside your server's root directory:

bash
Copy code
git clone https://github.com/utkarshpayal/InnovateED.git
In the project files, locate the includes/sql.php file and fill in your MySQL server details.

Access the following path on your server and provide the MySQL details once again. This step is crucial for the Login module to function correctly:

javascript
Copy code
<yourdomain.com>/account/login.php
An installation script will guide you through the process and help you set up the sql.php file required for the user registration system.

The database name we use is patents, which you can import into your MySQL server. The database file is available within the cloned files.

Once you have completed these steps, the installation process is finished, and you can run the solution on your local system. Ensure that you carefully follow the instructions and set up MySQL correctly to avoid encountering any issues, such as a 500 Server Error.
