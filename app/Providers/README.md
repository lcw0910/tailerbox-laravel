## History
* 2021-11-18 (Author : Cheolwon Lee)
  * 라우팅 정책 변경 (API 를 URI를 통한 분기가 아닌 도메인을 통해 분기되도록)
      >as-is : https://your-domain/api <br>
      to-be : https://api.your-domain

      ```dotenv
      API_DOMAIN=api.${YOUR-DOMAIN}
      WEB_DOMAIN=${YOUR-DOMAIN}
      ```
      ```php
      // app/Providers/RouteServiceProvider
    
          $this->routes(function () {
              // prefix를 통한 api route 식별
              /*Route::prefix('api')
                  ->middleware('api')
                  ->namespace($this->namespace)
                  ->group(base_path('routes/api.php'));*/
              
              # 도메인 기반의 api route 식별 방식으로 변경
              Route::domain(env('API_DOMAIN'))
                  ->middleware('api')
                  ->namespace($this->namespace)
                  ->group(base_path('routes/api.php'));
              
              /*Route::middleware('web')
                  ->namespace($this->namespace)
                  ->group(base_path('routes/web.php'));*/
              
              # API Domain 과의 URI가 중복되는 경우 Override 되는 것을 방지하기 위해 Web Route 에도 도메인을 추가
              Route::domain(env('WEB_DOMAIN'))
                  ->middleware('web')
                  ->namespace($this->namespace)
                  ->group(base_path('routes/web.php'));
          });
      ```
