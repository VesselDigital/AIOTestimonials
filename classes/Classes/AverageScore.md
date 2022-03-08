# Classes\AverageScore Class

This class has some helper functions related to the average score of your testimonials.

## Variables
```php
    /**
     * The option name saves the average score
     * 
     * Cannot be overridden
     */
    static protected $score_option_name = "aiotestimonials_average_score";

    /**
     * The option name saves the average score's last recalculation date
     * 
     * Cannot be overridden
     */
    static protected $score_lastrecalc_option_name = "aiotestimonials_average_score_recalc_date";
```

## Functions

Note: **All functions within this class are called statically!**

### ```generate(): float```
This will generate the average score, but not cache / save it. It is returned to use as you please, you can use this to generate a score each time if you do not want to wait for regeneration.


### ```setScore(): float```
This will generate the average score, and cache / save it. It will also return the new result.


### ```getScore(): float```
Fetches the cached / saved score if one is set, otherwise it will be calculated then returned.


### ```getLastRecalculation(): \DateTime|string```
This will get the last time the score was calculated, if it's not been calculated before it will return a string "Never"