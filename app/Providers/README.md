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

              if (FacadeRequest::server('HTTP_HOST') === env('API_DOMAIN')) {
                  // 도메인 기반의 api route 식별 방식으로 변경
                  Route::domain(env('API_DOMAIN'))
                      ->middleware('api')
                      ->namespace($this->namespace)
                      ->group(base_path('routes/api.php'));
              } elseif (FacadeRequest::server('HTTP_HOST') === env('WEB_DOMAIN')) {
                  Route::middleware('web')
                      ->namespace($this->namespace)
                      ->group(base_path('routes/web.php'));
              }
          });
      ```
