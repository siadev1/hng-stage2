# hng-stage2


This API allows you to manage user data including retrieval, creation, update, and deletion of user records.

Base URL
The base URL for this API is: https://https://sia-internship.000webhostapp.com/api/

Endpoints
1. Retrieve User Information
Endpoint: /api/

Method: GET

Request:

To retrieve user information, send a GET request to /api.
You can provide the user's ID as a parameter in a json to fetch a specific user's data.
Example Request:

http
Copy code
GET /api
{
"id":1
}
Response:

If the user is found, the API will respond with a JSON object containing the user's information.
If the user is not found, it will respond with a JSON message indicating that the data is not found.
Example Response (User Found):

json
Copy code
{
    "id": 1,
    "name": "John Doe",
    
}
Example Response (User data Not Found):

json
Copy code
{
    "message": "User data not found"
}
2. Create User
Endpoint: /api/

Method: POST

Request:

To create a new user, send a POST request to /api/ with JSON data containing the user's name.
Example Request:

http
Copy code
POST /api/

{
    "name": "Alice Johnson"
}
Response:

If the user is successfully created, the API will respond with a JSON object containing the new user's ID and name.
If there's an issue with the request or data, it will respond with a JSON error message.
Example Response (User Created):

json
Copy code
{
    "id": 124,
    "name": "Alice Johnson"
}
Example Response (Error):

json
Copy code
{
    "message": "Invalid JSON data"
}
3. Update User Information
Endpoint: /api/

Method: PUT

Request:

To update user information, send a PUT request to /api with JSON data containing the user's ID and new name.
Example Request:

http
Copy code
PUT /api/user

{
    "id": 2,
    "name": "New Name"
}
Response:

If the user is successfully updated, the API will respond with a JSON object containing a success message.
If there's an issue with the request or data, it will respond with a JSON error message.
Example Response (User Updated):

json
Copy code
{
    "message": "Successfully updated user"
}
Example Response (Error):

json
Copy code
{
    "message": "Invalid JSON data"
}
4. Delete User
Endpoint: /user

Method: DELETE

Request:

To delete a user, send a DELETE request to /user with JSON data containing the user's ID.
Example Request:

http
Copy code
DELETE /api/

{
    "id": 3
}
Response:

If the user is successfully deleted, the API will respond with a JSON object containing a success message.
If there's an issue with the request or data, it will respond with a JSON error message.
Example Response (User Deleted):

json
Copy code
{
    "message": "User deleted"
}
Example Response (Error):

json
Copy code
{
    "message": "Invalid JSON data"
}
Error Handling
If there's a request with invalid JSON data or any other issues, the API will respond with an appropriate HTTP status code and a JSON error message.

For 404 (Not Found) errors, the API will respond with an error message indicating that the requested data is not found.

This API documentation outlines the available endpoints, request methods, request format, and expected responses for managing user data. You can use this documentation as a reference when integrating and using the API in your applications.
