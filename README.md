# Golden Yellow Travel

## API Reference

#### Login (Post)

```http
  http://127.0.0.1:8000/api/v1/login
```

| Arguments | Type   | Description                  |
| :-------- | :----- | :--------------------------- |
| email     | sting  | **Required** admin@gmail.com |
| password  | string | **Required** asdffdsa        |

## User Profile

#### Register (Post)

```http
  http://127.0.0.1:8000/api/v1/register
```

| Arguments             | Type   | Description                  |
| :-------------------- | :----- | :--------------------------- |
| name                  | sting  | **Required** Post Malone     |
| email                 | sting  | **Required** admin@gmail.com |
| password              | string | **Required** asdffdsa        |
| password_confirmation | string | **Required** asdffdsa        |
| position              | enum   | **Required** admin/staff     |

#### Own Profile (Get)

```http
  http://127.0.0.1:8000/api/v1/your-profile
```

#### Check Specific User Profile (Get)

```http
  http://127.0.0.1:8000/api/v1/user-profile/{id}
```

#### Check User Lists (Get)

```http
  http://127.0.0.1:8000/api/v1/user-lists
```

#### Edit User Info(Get)

```http
  http://127.0.0.1:8000/api/v1/edit
```

| Arguments | Type  | Description              |
| :-------- | :---- | :----------------------- |
| name      | sting | **Required** Post Malone |

#### Password Update (Put)

```http
  http://127.0.0.1:8000/api/v1/update-password
```

| Arguments             | Type   | Description           |
| :-------------------- | :----- | :-------------------- |
| current_password      | sting  | **Required** asdffdsa |
| password              | string | **Required** asdffdsa |
| password_confirmation | string | **Required** asdffdsa |

#### Logout (Post)

```http
  http://127.0.0.1:8000/api/v1/logout
```

#### Logout from all devices(Post)

```http
  http://127.0.0.1:8000/api/v1/logout-all
```
