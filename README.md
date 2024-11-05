#Picsalator

Picsalator is a picture-sharing web application that allows users to upload, view, share, compress, and delete photos. This application also enables users to save images to a blob database or local storage, manage their profiles, and enjoy a streamlined photo-sharing experience. The project is built using PHP, CSS, and HTML and includes multiple pages with login and authentication capabilities.

#Project Structure

The project includes the following main folders and files:

public/: Contains the public-facing assets, such as images, CSS styles, and JavaScript files.
src/: Holds source files, including PHP scripts for API actions, authentication, and backend logic.
database/: The database structure for storing user information and image data (e.g., blobs).
README.md: Project documentation.

#Features

The following is a list of features planned for Picsalator, with implemented features checked off and partial completions noted:

 User Authentication (login/logout): 100%
 Image Uploading: 100%
 Image Compression (Automatic resizing for optimization): 75%
 Image Sharing with Specific Users: 50%
 Image Deletion: 100%
 Profile Management (Update username, profile picture): 50%
 Image Feed (View photos shared by others): 25%

#Live Demo

A live version of the app can be accessed at: Picsalator on digdug
Note: Replace yournamespace with the appropriate path.

#API Actions

The following API endpoints are available in Picsalator:

User Registration
Method: POST
Endpoint: /api/register
Parameters:
username (string)
password (string)
Response: Success or failure message with user ID on success.
User Login
Method: POST
Endpoint: /api/login
Parameters:
username (string)
password (string)
Response: Auth token on successful login.
Upload Image
Method: POST
Endpoint: /api/upload
Parameters:
image (binary)
Response: Image ID and URL on success.
Delete Image
Method: DELETE
Endpoint: /api/delete/{image_id}
Parameters:
image_id (integer)
Response: Success message.
Get User Images
Method: GET
Endpoint: /api/user-images
Parameters:
user_id (integer)
Response: List of image metadata for the user.
Share Image with Another User
Method: POST
Endpoint: /api/share
Parameters:
image_id (integer)
recipient_id (integer)
Response: Success or failure message.
Data Model

Client-Side Data
Session Data: Stores authentication token and basic user information in local storage.
Image Cache: Temporary storage of images while uploading or processing.
Server-Side Data
Users Table: Stores user data, including id, username, password_hash, and profile_picture.
Images Table: Stores image metadata, including image_id, user_id, blob_data (image stored as a blob), upload_date, and compression_level.
SharedImages Table: Stores information on shared images, including image_id, shared_with_user_id, and share_date.
