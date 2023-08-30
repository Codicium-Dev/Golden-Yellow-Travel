# Golden Yellow Travel

## API Reference

#### Login (Post)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/login
```

| Arguments | Type   | Description                  |
| :-------- | :----- | :--------------------------- |
| email     | sting  | **Required** admin@gmail.com |
| password  | string | **Required** asdffdsa        |

## User Profile

#### Register (Post)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/register
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
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/your-profile
```

#### Check Specific User Profile (Get)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/user-profile/{id}
```

#### Check User Lists (Get)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/user-lists
```

#### Edit User Info(Get)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/edit
```

| Arguments | Type  | Description              |
| :-------- | :---- | :----------------------- |
| name      | sting | **Required** Post Malone |

#### Password Update (Put)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/update-password
```

| Arguments             | Type   | Description           |
| :-------------------- | :----- | :-------------------- |
| current_password      | sting  | **Required** asdffdsa |
| password              | string | **Required** asdffdsa |
| password_confirmation | string | **Required** asdffdsa |

#### Logout (Post)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/logout
```

#### Logout from all devices(Post)

```http
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/logout-all
```

## Media

### Photo

#### Store Photo (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/store
```

| Arguments | Type  | Description     |
| :-------- | :---- | :-------------- |
| photos[]  | array | **Required** [] |

#### Get Photo (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/list
```

#### Show Photo (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/show/{id}
```

#### Delete Photo (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/delete/{id}
```

#### Multiple Photo Delete (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/multiple-delete
```

| Arguments | Type  | Description          |
| :-------- | :---- | :------------------- |
| photos    | array | **Required** [1,2,3] |

###### Note : ID must be in Array.

#### Trash (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/trash
```

#### Restore (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/restore/{id}
```

#### Force Delete (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/force-delete/{id}
```

#### Clear Trash (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/photo/clear-trash
```

## Traveling

### Country

### Store Country (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/country/store
```

| Arguments     | Type   | Description  |
| :------------ | :----- | :----------- |
| name          | string | **Required** |
| country_photo | string | **Nullable** |

#### Get Country (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/country/list
```

#### Show Country (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/country/show/{id}
```

### Update Country (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/country/update
```

| Arguments     | Type   | Description  |
| :------------ | :----- | :----------- |
| name          | string | **Required** |
| country_photo | string | **Nullable** |

#### Delete Country (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/country/delete/{id}
```

## City Tours

### City

### Store City (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/city/store
```

| Arguments  | Type    | Description  |
| :--------- | :------ | :----------- |
| name       | string  | **Required** |
| country_id | integer | **Required** |
| city_photo | string  | **Nullable** |

#### Get City (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/city/list
```

#### Show City (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/city/show/{id}
```

### Update City (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/city/update
```

| Arguments  | Type   | Description  |
| :--------- | :----- | :----------- |
| name       | string | **Required** |
| city_photo | string | **Nullable** |

#### Delete City (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/city/delete/{id}
```

### City Tour

### Store City Tour (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/store
```

| Arguments  | Type    | Description  |
| :--------- | :------ | :----------- |
| name       | string  | **Required** |
| city_id    | integer | **Required** |
| overview   | string  | **Nullable** |
| date       | date    | **Nullable** |
| price      | integer | **Nullable** |
| sale_price | integer | **Nullable** |
| location   | string  | **Nullable** |
| departure  | string  | **Nullable** |
| theme      | string  | **Nullable** |
| duration   | string  | **Nullable** |
| rating     | integer | **Nullable** |
| type       | string  | **Nullable** |
| style      | string  | **Nullable** |
| for_whom   | string  | **Nullable** |
| tour_photo | string  | **Nullable** |

#### Get City Tour (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/list
```

#### Show City Tour (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/show/{id}
```

### Update City Tour (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/update
```

| Arguments  | Type    | Description  |
| :--------- | :------ | :----------- |
| name       | string  | **Required** |
| overview   | string  | **Nullable** |
| date       | date    | **Nullable** |
| price      | integer | **Nullable** |
| sale_price | integer | **Nullable** |
| location   | string  | **Nullable** |
| departure  | string  | **Nullable** |
| theme      | string  | **Nullable** |
| duration   | string  | **Nullable** |
| rating     | integer | **Nullable** |
| type       | string  | **Nullable** |
| style      | string  | **Nullable** |
| for_whom   | string  | **Nullable** |
| tour_photo | string  | **Nullable** |

#### Delete City Tour (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/delete/{id}
```

### City Tour Itinerary

### Store City Itinerary (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/store
```

| Arguments       | Type    | Description  |
| :-------------- | :------ | :----------- |
| name            | string  | **Required** |
| tour_id         | integer | **Nullable** |
| description     | string  | **Nullable** |
| meal            | string  | **Nullable** |
| accommodation   | string  | **Nullable** |
| note            | string  | **Nullable** |
| itinerary_photo | string  | **Nullable** |

#### Get City Itinerary (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/list
```

#### Show City Itinerary (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/show/{id}
```

### Update City Itinerary (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/update
```

| Arguments       | Type   | Description  |
| :-------------- | :----- | :----------- |
| name            | string | **Required** |
| description     | string | **Nullable** |
| meal            | string | **Nullable** |
| accommodation   | string | **Nullable** |
| note            | string | **Nullable** |
| itinerary_photo | string | **Nullable** |

#### Delete City Itinerary (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/delete/{id}
```

### City Tour Inclusion

### Store City Inclusion (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/store
```

| Arguments          | Type    | Description  |
| :----------------- | :------ | :----------- |
| tour_id            | integer | **Required** |
| start_date         | date    | **Nullable** |
| end_date           | date    | **Nullable** |
| category           | string  | **Nullable** |
| price              | integer | **Nullable** |
| sale_price         | integer | **Nullable** |
| private_price      | integer | **Nullable** |
| sale_private_price | integer | **Nullable** |

#### Get City Inclusion (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/list
```

#### Show City Inclusion (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/show/{id}
```

### Update City Inclusion (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/update
```

| Arguments          | Type    | Description  |
| :----------------- | :------ | :----------- |
| tour_id            | integer | **Required** |
| start_date         | date    | **Nullable** |
| end_date           | date    | **Nullable** |
| category           | string  | **Nullable** |
| price              | integer | **Nullable** |
| sale_price         | integer | **Nullable** |
| private_price      | integer | **Nullable** |
| sale_private_price | integer | **Nullable** |

#### Delete City Inclusion (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/delete/{id}
```

## Package Tours

### Package

### Store Package (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/package/store
```

| Arguments     | Type    | Description  |
| :------------ | :------ | :----------- |
| name          | string  | **Required** |
| country_id    | integer | **Required** |
| package_photo | string  | **Nullable** |

#### Get Package (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/package/list
```

#### Show Package (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/package/show/{id}
```

### Update Package (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/package/update
```

| Arguments     | Type   | Description  |
| :------------ | :----- | :----------- |
| name          | string | **Required** |
| package_photo | string | **Nullable** |

#### Delete Package (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/package/delete/{id}
```

### Package Tour

### Store Package Tour (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/store
```

| Arguments          | Type    | Description  |
| :----------------- | :------ | :----------- |
| name               | string  | **Required** |
| package_id         | integer | **Required** |
| overview           | string  | **Nullable** |
| date               | date    | **Nullable** |
| price              | integer | **Nullable** |
| sale_price         | integer | **Nullable** |
| location           | string  | **Nullable** |
| departure          | string  | **Nullable** |
| theme              | string  | **Nullable** |
| duration           | string  | **Nullable** |
| rating             | integer | **Nullable** |
| type               | string  | **Nullable** |
| style              | string  | **Nullable** |
| for_whom           | string  | **Nullable** |
| package_tour_photo | string  | **Nullable** |

#### Get Package Tour (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/list
```

#### Show Package Tour (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/show/{id}
```

### Update Package Tour (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/update
```

| Arguments          | Type    | Description  |
| :----------------- | :------ | :----------- |
| name               | string  | **Required** |
| overview           | string  | **Nullable** |
| date               | date    | **Nullable** |
| price              | integer | **Nullable** |
| sale_price         | integer | **Nullable** |
| location           | string  | **Nullable** |
| departure          | string  | **Nullable** |
| theme              | string  | **Nullable** |
| duration           | string  | **Nullable** |
| rating             | integer | **Nullable** |
| type               | string  | **Nullable** |
| style              | string  | **Nullable** |
| for_whom           | string  | **Nullable** |
| package_tour_photo | string  | **Nullable** |

#### Delete Package Tour (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/tour/delete/{id}
```

### Package Tour Itinerary

### Store Package Tour Itinerary (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/store
```

| Arguments               | Type    | Description  |
| :---------------------- | :------ | :----------- |
| name                    | string  | **Required** |
| package_tour_id         | integer | **Nullable** |
| description             | string  | **Nullable** |
| meal                    | string  | **Nullable** |
| accommodation           | string  | **Nullable** |
| note                    | string  | **Nullable** |
| package_itinerary_photo | string  | **Nullable** |

#### Get Package Tour Itinerary (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/list
```

#### Show Package Tour Itinerary (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/show/{id}
```

### Update Package Tour Itinerary (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/update
```

| Arguments               | Type   | Description  |
| :---------------------- | :----- | :----------- |
| name                    | string | **Required** |
| description             | string | **Nullable** |
| meal                    | string | **Nullable** |
| accommodation           | string | **Nullable** |
| note                    | string | **Nullable** |
| package_itinerary_photo | string | **Nullable** |

#### Delete Package Tour Itinerary (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/itinerary/delete/{id}
```

### Package Tour Inclusion

### Store Package Tour Inclusion (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/store
```

| Arguments          | Type    | Description  |
| :----------------- | :------ | :----------- |
| package_tour_id    | integer | **Required** |
| start_date         | date    | **Nullable** |
| end_date           | date    | **Nullable** |
| category           | string  | **Nullable** |
| price              | integer | **Nullable** |
| sale_price         | integer | **Nullable** |
| private_price      | integer | **Nullable** |
| sale_private_price | integer | **Nullable** |

#### Get Package Tour Inclusion (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/list
```

#### Show Package Tour Inclusion (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/show/{id}
```

### Update Package Tour Inclusion (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/update
```

| Arguments          | Type    | Description  |
| :----------------- | :------ | :----------- |
| start_date         | date    | **Nullable** |
| end_date           | date    | **Nullable** |
| category           | string  | **Nullable** |
| price              | integer | **Nullable** |
| sale_price         | integer | **Nullable** |
| private_price      | integer | **Nullable** |
| sale_private_price | integer | **Nullable** |

#### Delete Package Tour Inclusion (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/inclusion/delete/{id}
```

## News

### News

### Store News (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news/store
```

| Arguments   | Type   | Description  |
| :---------- | :----- | :----------- |
| title       | string | **Required** |
| description | string | **Nullable** |
| title_photo | string | **Nullable** |

#### Get News (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news/list
```

#### Show News (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news/show/{id}
```

### Update News (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news/update
```

| Arguments   | Type   | Description  |
| :---------- | :----- | :----------- |
| title       | string | **Required** |
| description | string | **Nullable** |
| title_photo | string | **Nullable** |

#### Delete News (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news/delete/{id}
```

### News Content

### Store News Content (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news-content/store
```

| Arguments     | Type    | Description  |
| :------------ | :------ | :----------- |
| title         | string  | **Required** |
| subtitle      | string  | **Nullable** |
| news_id       | integer | **Required** |
| content       | string  | **Nullable** |
| content_photo | string  | **Nullable** |

#### Get News Content (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news-content/list
```

#### Show News Content (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news-content/show/{id}
```

### Update News Content (Put)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news-content/update
```

| Arguments     | Type    | Description  |
| :------------ | :------ | :----------- |
| title         | string  | **Required** |
| subtitle      | string  | **Nullable** |
| news_id       | integer | **Required** |
| content       | string  | **Nullable** |
| content_photo | string  | **Nullable** |

#### Delete News Content (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/news-content/delete/{id}
```

## Inquiry Form

### Form

#### Store Form (Post)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/store
```

| Arguments         | Type    | Description  |
| :---------------- | :------ | :----------- |
| travel_month      | integer | **Required** |
| travel_year       | integer | **Required** |
| stay_days         | integer | **Required** |
| budget            | integer | **Required** |
| adult_count       | integer | **Required** |
| child_count       | integer | **Required** |
| interest          | string  | **Required** |
| destinations      | string  | **Required** |
| f_name            | string  | **Required** |
| l_name            | string  | **Nullable** |
| email             | string  | **Required** |
| phone             | string  | **Required** |
| own_country       | string  | **Nullable** |
| accommodation     | string  | **Nullable** |
| how_u_know        | string  | **Nullable** |
| other_information | string  | **Nullable** |
| special_note      | string  | **Nullable** |

#### Get Form (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/list
```

#### Show Form (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/show/{id}
```

#### Delete Form (Del)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/delete/{id}
```

###### Note : ID must be in Array.

#### Form Trash (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/trash
```

#### Form Restore (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/restore/{id}
```

#### Force Delete (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/force-delete/{id}
```

#### Clear Trash (Get)

```https
https://api.goldenyellowtravel.yolodigitalmyanmar.com/api/v1/form/clear-trash
```
