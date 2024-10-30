@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
    {{-- Include Hero --}}
    @include('home.components.hero')

    {{-- Include Kesehatan Gigi --}}
    @include('home.components.kesehatan-gigi')

    {{-- Include Survey --}}
    @include('home.components.survey')

    {{-- Include Peta --}}
    @include('home.components.peta')

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const offset = 50;

                const targetPosition = target.getBoundingClientRect().top + window.scrollY - offset;
                const startPosition = window.scrollY;
                const distance = targetPosition - startPosition;
                const duration = 700;
                let startTime = null;

                function animation(currentTime) {
                    if (startTime === null) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);

                    // Fungsi easing untuk efek halus
                    const ease = progress < 0.5 ?
                        2 * progress * progress :
                        -1 + (4 - 2 * progress) * progress;

                    window.scrollTo(0, startPosition + distance * ease);

                    if (timeElapsed < duration) {
                        requestAnimationFrame(animation);
                    }
                }

                requestAnimationFrame(animation);
            });
        });
    </script>

@endsection
