# user-devices

## Installation

1. Clone this repository
2. Run `./init.sh` in the root folder of the repository. This script will build required images, prepare application's environment and fill database with dummy data
3. Access application at `http://app.localhost`

## Usage

API documentation is available at https://dlhy6mzq5m.apidog.io/.

Endpoints are prefix with `/api/v1`. For example, to get all devices for user with id `1` you should send a GET request to `http://app.localhost/api/v1/users/1/devices`.