<!doctype html>
<html lang="{{ app()->getLocale() }}">
  @include ('layout.head')

  <body>
    @include ('layout.header')

    <main>
      @yield ('content')
    </main>
  </body>
</html>
