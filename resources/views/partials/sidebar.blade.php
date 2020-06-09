<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <div class="logo"><a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ config('app.name', 'WildNotes') }}
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active">
        <a class="nav-link">
          <i class="material-icons">filter_alt</i>
          <p>Filtros</p>
        </a>
      </li>
      <form action="{{ url('notes') }}" method="post">
        @csrf
      <li class="nav-item">
        <label class="form-check-label nav-link mt-2">
          MATERIAS
        </label>
        @forelse ($subjects as $subject)
          <a class="form-check nav-link mt-0 pt-0">
            <label class="form-check-label">
              <input type="checkbox" name="subjects[]" value="{{ $subject->id }}"
              @if(isset($checkSubjects))
                @foreach ($checkSubjects as $checkSubject)
                   {{ $checkSubject == $subject->id ? 'checked' : '' }}
                @endforeach
              @endif
              >
                {{ $subject->name }}
            </label>
          </a>
        @empty
          <label class="form-check-label">
            No hay materias disponibles
          </label>
        @endforelse
      </li>
      <li class="nav-item">
        <label class="form-check-label nav-link mt-2">
          COLORES
        </label>
        @forelse ($colors as $color)
          <a class="form-check nav-link mt-0 pt-0">
            <label class="form-check-label">
              <input type="checkbox" name="colors[]" value="{{ $color->id }}"
              @if(isset($checkColors))
                @foreach ($checkColors as $checkColor)
                   {{ $checkColor == $color->id ? 'checked' : '' }}
                @endforeach
              @endif
              >
                {{ $color->name }}
            </label>
          </a>
        @empty
          <label class="form-check-label">
            No hay colores disponibles
          </label>
        @endforelse
      </li>
      <button class="btn btn-primary m-5" type="submit" name="button">Aplicar Filtro</button>
      </form>
    </ul>
  </div>
</div>
