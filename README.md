# IAI-TOGO Recruitment Platform
## Preview
Due to server hosting limitations, the current deployment is presented as a static HTML content, showcasing the frontend of the application and only showing the **home page**. For a preview, [click here](https://php-school-project-static-html.vercel.app/)
## Purpose
The IAI-TOGO Recruitment Platform is a web application designed to automate the annual student recruitment process for the Institut Africain d’Informatique, représentation du Togo (IAI-TOGO). It aims to streamline the application process and provide administrators with statistical insights.

## Technologies used
- PHP
- JavaScript
- Jquery
- CSS
- MySQL

## Features

### Front-end:
- **Home Page:**
  - Displays detailed information about the annual recruitment competition.
  - Includes two buttons: "Create an Account" and "Login."
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/5b32cad3-b1eb-448f-ae12-1422fdf7b045)


- **Account Creation/Login:**
  - Candidates can create an account with a username and password.
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/49050e92-201e-41cb-a6aa-8da847754c95)
  #
  - After logging in, the username is displayed on all pages with a logout option.
  #
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/2ce0f0f9-07cf-4b1f-b9df-11395d062f1e)

- **Dashboard for Logged-in Candidates:**
  - Displays information about the competition.
  - Shows either a "Consult Application" button or a "Apply for the Competition" button based on the candidate's status.
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/ded4c5ea-1bb5-44f6-bac9-364816db00c3)


- **Application Form:**
  - Fields include name, surname, photo, date of birth, gender, nationality, year of BAC II completion (within two years), and series (C, D, E, F1, or F2).
  - Requires the upload of three PDF documents: birth certificate, nationality proof, and BAC II certificate.
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/b2e732fc-a7b7-475c-a85d-b14540e5a5d1)


- **Confirmation and Consultation:**
  - After submitting the application, candidates receive a confirmation notification.
  - Candidates can consult their applications, edit them, or delete them before the application deadline.

### Back-end:
- **Administration Panel:**
  - Accessed through an authentication-protected URL.
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/cfb3defb-6211-4dfb-84b4-f2376454b5b3)
  #

  - Dashboard displays statistics, competition date, and application deadline.
  ![image](https://github.com/Fadilix/php-projet/assets/121851593/c9e7f563-04a1-425d-bb9e-c189a23a7931)


- **Statistics:**
  - Lists of candidates by various categories: overall, by gender, by nationality, etc.
  - Identifies candidates who applied more than once or omitted document uploads.
  - Provides total registration count.

- **Administrative Functions:**
  - Administrator cannot modify or delete a candidate's application.
  - Administrator can set the competition and application deadline dates.
  - Dates are used to prevent applications after the competition date.

## Note:
- The platform handles only one competition.
