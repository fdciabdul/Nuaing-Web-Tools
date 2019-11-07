# PHP Web Search Results Scraper
A simple demonstration of scraping capabilities of PHP to fetch top results from Google, Bing and Quora.

## Classes
### Search.php
Contains implementation of base class `Search` to allow scraping and DOM parsing functionalities.

### GoogleSearch.php
Contains Google oriented implementation for scraping title, description and url of the top results.

### BingSearch.php
Contains Bing oriented implementation for scraping title, description and url of the top results.

### QuoraSearch.php
Contains Quora oriented implementation for scraping question title and description of the top questions with the given search query.

## Queries
### type
Defines the type of search engine to use. It can take value of `google`, `bing` and `quora`.

### limit
Defines the number of results to be scraped. It can only scrape content from first page only.

### q
Defines the search query terms