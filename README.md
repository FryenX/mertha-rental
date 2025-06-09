# Mertha Rental - Motorcycle Rental Service

[](https://www.google.com/search?q=LICENSE)
[](https://www.google.com/search?q=https://github.com/FryenX/mertha-rental/stargazers)
[](https://www.google.com/search?q=https://github.com/FryenX/mertha-rental/network/members)

Mertha Rental is a straightforward **motorcycle rental service** designed for **easy deployment**. Just clone the repository, import the database, and you're ready to start\!

-----

## Getting Started

This project is designed to be **"plug and play."** Follow these simple steps to get it up and running on your local machine.

### 1\. Clone the Repository

To begin, open your terminal or command prompt and execute the following command to clone the project:

```bash
git clone https://github.com/FryenX/mertha-rental.git
cd mertha-rental
```

### 2\. Import the Database

The project requires a database to function. You'll find the necessary SQL dump file, named **`bike-rental.sql`**, in the root directory of your cloned repository.

  * **Create a new database** (e.g., `bike_rental`) in your preferred database management tool (like **phpMyAdmin**, **MySQL Workbench**, **Adminer**, or directly via command line).

  * **Import the `bike-rental.sql` file** into this newly created database. This action will set up all the required tables and populate them with initial data.

    *Example (using MySQL command line):*

    ```bash
    mysql -u root -p your_database_name < bike-rental.sql
    ```

    *(Remember to replace `your_database_name` with the actual name of your database.)*

-----

### 3\. Run the Application

Once the database is set up, you're ready to launch the application:

  * Ensure your **web server** (e.g., **Apache**, **Nginx**) is properly configured to serve the `mertha-rental` directory.
  * Confirm that **PHP** is installed and running correctly on your server.

After your web server is configured, simply open your web browser and navigate to the project directory. For instance, if you're using a local server, the URL might look like this:

```
http://localhost/mertha-rental/
```

*(Please **adjust the URL** based on your specific web server setup.)*

-----

### 4\. Admin Login

Once the application is running, you can access the **administrator panel** using these default credentials:

  * **Username:** `ardiwidana`
  * **Password:** `admin`

-----

This README should provide a clear and visually appealing guide for anyone looking to set up your Mertha Rental project. Let me know if you'd like any other adjustments\!
