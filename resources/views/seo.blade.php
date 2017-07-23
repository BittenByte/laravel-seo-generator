@extends ('layout.master')

@section ('content')
  <form action="{{ route('show') }}" method="get">
    <button type="submit" class="button is-primary is-generate">
      Generate
    </button>

    <div class="columns is-multiline">
      @foreach ($groups as $group => $fields)
        <div class="column is-4">
          <h3 class="title is-3">{{ $group }}</h2><br/>

          @foreach ($fields as $name => $label)
            @if ($label == 'Image')
                            <label class="label">{{ $label }}</label>
              <div class="field has-addons">
                <div class="control is-expanded">
                  <input class="input" name="{{ $name }}" value="{{ array_get($seo, $name) }}" type="text" placeholder="Set {{ $label }}...">
                </div>
                <div class="control">
                  <a href="{{ array_get($seo, $name) }}" target="_blank" class="button">
                    <img class="image is-32x32" src="{{ array_get($seo, $name) }}" />
                  </a>
                </div>
              </div>
            @else
              <div class="field">
                <label class="label">{{ $label }}</label>
                <div class="control">
                  <input class="input" name="{{ $name }}" value="{{ array_get($seo, $name) }}" type="text" placeholder="Set {{ $label }}...">
                </div>
              </div>
            @endif
          @endforeach
        </div>
      @endforeach
    </div>
  </form>

  <hr/>

  <nav class="level">
    <div class="level-item has-text-centered">
      <a href="{{ route('randomize') }}" class="button is-warning">
        <span class="icon">
          <i class="fa fa-random"></i>
        </span>

        <span>Randomize</span>
      </a>
    </div>
    <div class="level-item has-text-centered">
      <a href="{{ route('show') }}" class="button is-danger">
        <span class="icon">
          <i class="fa fa-times"></i>
        </span>

        <span>Reset</span>
      </a>
    </div>
  </nav>
</div>

@endsection