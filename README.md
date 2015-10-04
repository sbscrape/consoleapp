##consoleapp

####Prerequisits

- GNU make
- composer (in executable path)
- PHP 5.5 or better (will be enforced by composer as well)

####Building

First, clone the git repostory

Then intialize it
```
make init
```

####The application

To run the app:

````
php src/Scraper/console.php sainsbury:scraper <url>
````

In case of this example this would be:

````
php src/Scraper/console.php sainsbury:scraper "http://www.sainsburys.co.uk/webapp/wcs/stores/servlet/CategoryDisplay?listView=true&orderBy=FAVOURITES_FIRST&parent_category_rn=12518&top_category=12518&langId=44&beginIndex=0&pageSize=20&catalogId=10137&searchTerm=&categoryId=185749&listId=&storeId=10151&promotionId=#langId=44&storeId=10151&catalogId=10137&categoryId=185749&parent_category_rn=12518&top_category=12518&pageSize=20&orderBy=FAVOURITES_FIRST&searchTerm=&beginIndex=0&hideFilters=true"
````

Make sure that the url is properly quoted and it is in one line

####Tests

To run tests:

````
make test
````

