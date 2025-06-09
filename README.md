# Mertha Rental - Motorcycle Rental Service

## Mertha Rental is a simple motorcycle rental service designed for easy deployment. Just clone, import the database, and you're ready to go!

## Getting Started

This project is designed to be "plug and play." Follow these steps to get it up and running on your local machine.

### 1. Clone the Repository

Open your terminal or command prompt and run the following command to clone the project:

```bash
git clone [https://github.com/FryenX/mertha-rental.git](https://github.com/FryenX/mertha-rental.git)
cd mertha-rental
   ```

### 2. Import the Database

#######The project requires a database. You'll find the SQL dump file named bike-rental.sql in the root of the cloned repository.
#######Create a new database (e.g., bike_rental) in your preferred database management tool (like phpMyAdmin, MySQL Workbench, Adminer, or directly via command line).
#######Import the bike-rental.sql file into the newly created database. This will set up all the necessary tables and initial data.
#######Example (using MySQL command line):

```bash
mysql -u root -p your_database_name < bike-rental.sql
```

### 3. Run the Application
########Ensure your web server (e.g., Apache, Nginx) is configured to serve the mertha-rental directory.
########Make sure PHP is running and configured correctly.
########Once your web server is set up, navigate to the project directory in your web browser. For example, if you're using a local server, it might be:

```bash
http://localhost/mertha-rental/
```
#### (Adjust the URL based on your web server configuration.)

### 4. Admin Login
########After the application is running, you can log in to the admin panel using the following credentials:

###########Username: ardiwidana
###########Password: admin
