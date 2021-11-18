## History

* 2021-11-18
  > **app.php** <br>
  > ```php
  > #Timezone 설정이 환경변수를 참조하도록 변경
  > # AS-IS
  > //'timezone' => 'en',
  > # TO-BE
  > 'timezone' => env('TIMEZONE'),
  > 
  > # Locale 설정이 환경변수를 참조하도록 변경
  > # AS-IS
  > //'locale' => 'en',
  > # TO-BE
  > 'locale' => env('LOCALE'),
  > ```
