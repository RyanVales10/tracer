@extends('layouts.app')

@section('title', 'ADDU Alumni Tracer Study')

@section('content')
<style>
    @import url('https://fonts.bunny.net/css?family=montserrat:500,600,700,800|source-sans-3:400,600,700');

    .welcome-page {
        --addu-blue: #003a8c;
        --addu-blue-deep: #002a63;
        --addu-blue-bright: #0b58c4;
        --addu-gold: #f5b800;
        --addu-gold-deep: #dca000;
        --addu-red: #9e1b32;
        --addu-ink: #11243f;
        --addu-muted: #4d607b;
        font-family: 'Source Sans 3', sans-serif;
        background: linear-gradient(170deg, #eaf1ff 0%, #f7f9ff 40%, #ffffff 100%);
    }

    .welcome-page .title-font {
        font-family: 'Montserrat', sans-serif;
    }

    .welcome-page .hero-panel {
        background: linear-gradient(135deg, var(--addu-blue-deep) 0%, var(--addu-blue) 58%, var(--addu-blue-bright) 100%);
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 20px 45px rgba(0, 42, 99, 0.32);
    }

    .welcome-page .hero-glow-a,
    .welcome-page .hero-glow-b {
        position: absolute;
        border-radius: 9999px;
        filter: blur(46px);
        pointer-events: none;
    }

    .welcome-page .hero-glow-a {
        width: 260px;
        height: 260px;
        right: -50px;
        top: -50px;
        background: rgba(245, 184, 0, 0.38);
    }

    .welcome-page .hero-glow-b {
        width: 230px;
        height: 230px;
        left: -60px;
        bottom: -60px;
        background: rgba(158, 27, 50, 0.25);
    }

    .welcome-page .badge {
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.28);
        color: #fff;
    }

    .welcome-page .time-chip {
        background: linear-gradient(90deg, var(--addu-gold) 0%, var(--addu-gold-deep) 100%);
        color: #172741;
    }

    .welcome-page .action-card {
        background: #ffffff;
        border: 1px solid #d8e3f7;
        box-shadow: 0 14px 30px rgba(17, 36, 63, 0.14);
    }

    .welcome-page .start-btn {
        background: linear-gradient(90deg, var(--addu-blue) 0%, var(--addu-blue-deep) 100%);
        color: #fff;
    }

    .welcome-page .start-btn:hover {
        background: linear-gradient(90deg, var(--addu-blue-deep) 0%, #001e48 100%);
    }

    .welcome-page .info-card {
        background: #fff;
        border: 1px solid #dbe5f6;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(17, 36, 63, 0.09);
        padding: 1.25rem;
    }

    .welcome-page .info-card.blue {
        border-top: 5px solid var(--addu-blue);
    }

    .welcome-page .info-card.gold {
        border-top: 5px solid var(--addu-gold);
    }

    .welcome-page .info-card.red {
        border-top: 5px solid var(--addu-red);
    }

    .welcome-page .privacy-panel {
        border: 1px solid #c6d7f4;
        background: linear-gradient(90deg, #eef4ff 0%, #fff7dc 100%);
    }

    .welcome-page .text-main {
        color: var(--addu-ink);
    }

    .welcome-page .text-muted {
        color: var(--addu-muted);
    }

    .welcome-page .timeline-shell {
        border: 1px solid #d6e1f3;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 8px 18px rgba(17, 36, 63, 0.08);
        padding: 1rem;
    }

    .welcome-page .timeline-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .welcome-page .timeline-step {
        border: 1px solid #e1e8f4;
        border-radius: 12px;
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        padding: 0.9rem;
    }

    .welcome-page .step-dot {
        width: 1.85rem;
        height: 1.85rem;
        border-radius: 9999px;
        background: var(--addu-blue);
        color: #fff;
        font-size: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .welcome-page .faq-shell {
        border: 1px solid #d6e1f3;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 8px 18px rgba(17, 36, 63, 0.08);
        padding: 1rem;
    }

    .welcome-page .faq-item {
        border: 1px solid #e3e9f5;
        border-radius: 12px;
        background: #fbfcff;
        padding: 0.7rem 0.9rem;
    }

    .welcome-page .faq-item + .faq-item {
        margin-top: 0.65rem;
    }

    .welcome-page .faq-item summary {
        cursor: pointer;
        list-style: none;
        font-weight: 700;
        color: var(--addu-ink);
    }

    .welcome-page .faq-item summary::-webkit-details-marker {
        display: none;
    }

    .welcome-page .faq-item p {
        margin-top: 0.45rem;
        color: var(--addu-muted);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    @media (min-width: 768px) {
        .welcome-page .timeline-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
</style>

<div class="welcome-page min-h-screen py-10 px-4 sm:px-6 lg:px-8">
    <section class="relative mx-auto max-w-6xl overflow-hidden rounded-3xl hero-panel text-white">
        <div class="hero-glow-a"></div>
        <div class="hero-glow-b"></div>

        <div class="relative grid gap-8 px-6 py-10 sm:px-10 sm:py-12 lg:grid-cols-[1.35fr_1fr] lg:items-center lg:px-12 lg:py-14">
            <div>
                <div class="badge inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs font-semibold uppercase tracking-[0.12em]">
                    Ateneo de Davao University
                </div>

                <h1 class="title-font mt-5 text-4xl font-extrabold leading-tight sm:text-5xl lg:text-6xl">
                    ADDU Alumni
                    <span class="block" style="color: #f5b800;">Tracer Study</span>
                </h1>

                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-white/90 sm:text-xl">
                    Your story after graduation helps us improve learning, career preparation, and alumni support for future Ateneans.
                </p>

                <div class="mt-7 flex flex-wrap items-center gap-3">
                    <span class="time-chip inline-flex items-center rounded-full px-4 py-2 text-sm font-bold">
                        15-20 minutes to complete
                    </span>
                    <span class="badge inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold">
                        One raffle entry for an Ateneo Jacket
                    </span>
                </div>
            </div>

            <aside class="action-card rounded-2xl p-6 sm:p-7">
                <h2 class="title-font text-2xl font-bold text-main">Ready to begin?</h2>
                <p class="mt-2 text-base leading-relaxed text-muted">
                    Please answer as honestly as possible. Your response is valuable and treated with confidentiality.
                </p>
                <a
                    href="{{ url('/survey') }}"
                    class="start-btn mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl px-6 py-3.5 text-lg font-bold transition"
                >
                    Start Survey
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <p class="mt-3 text-center text-sm text-slate-500">You can save your progress and resume later.</p>
            </aside>
        </div>
    </section>

    <section class="mx-auto mt-6 max-w-6xl pb-8">
        <div class="grid gap-4 md:grid-cols-3">
            <article class="info-card blue">
                <h3 class="title-font text-2xl font-bold text-main">About This Study</h3>
                <p class="mt-2 text-base leading-relaxed text-muted">
                    The tracer study gathers insights on career paths, achievements, and alumni experiences to improve
                    academic programs and institutional services.
                </p>
            </article>

            <article class="info-card gold">
                <h3 class="title-font text-2xl font-bold text-main">Time Commitment</h3>
                <p class="mt-2 text-base leading-relaxed text-muted">
                    The survey takes around <span class="font-bold" style="color: #11243f;">15-20 minutes</span>.
                    Please complete it in one sitting if possible.
                </p>
            </article>

            <article class="info-card red">
                <h3 class="title-font text-2xl font-bold text-main">Prize Incentive</h3>
                <p class="mt-2 text-base leading-relaxed text-muted">
                    Every completed response receives one raffle entry for a chance to win an
                    <span class="font-bold" style="color: #11243f;">Ateneo Jacket</span>.
                </p>
            </article>
        </div>

        <div class="privacy-panel mt-5 rounded-2xl p-5">
            <p class="text-base leading-relaxed text-muted">
                <span class="font-bold" style="color: #003a8c;">Privacy Note:</span>
                All responses are collected anonymously and will be used solely for research and institutional improvement purposes.
            </p>
        </div>

        <div class="timeline-shell mt-5">
            <h3 class="title-font text-2xl font-bold text-main">What to Expect</h3>
            <div class="timeline-grid mt-4">
                <div class="timeline-step">
                    <div class="flex items-center gap-2">
                        <span class="step-dot">1</span>
                        <p class="font-bold text-main">Identification</p>
                    </div>
                    <p class="mt-2 text-sm text-muted">Provide contact and basic profile details.</p>
                </div>
                <div class="timeline-step">
                    <div class="flex items-center gap-2">
                        <span class="step-dot">2</span>
                        <p class="font-bold text-main">Background</p>
                    </div>
                    <p class="mt-2 text-sm text-muted">Share education and personal background data.</p>
                </div>
                <div class="timeline-step">
                    <div class="flex items-center gap-2">
                        <span class="step-dot">3</span>
                        <p class="font-bold text-main">Career & Feedback</p>
                    </div>
                    <p class="mt-2 text-sm text-muted">Tell us about work outcomes and ADdU relevance.</p>
                </div>
                <div class="timeline-step">
                    <div class="flex items-center gap-2">
                        <span class="step-dot">4</span>
                        <p class="font-bold text-main">Submit</p>
                    </div>
                    <p class="mt-2 text-sm text-muted">Review responses and complete your entry.</p>
                </div>
            </div>
        </div>

        <div class="faq-shell mt-5">
            <h3 class="title-font text-2xl font-bold text-main">Frequently Asked Questions</h3>
            <div class="mt-4">
                <details class="faq-item" open>
                    <summary>Are my answers anonymous?</summary>
                    <p>Yes. Responses are used for institutional research and reporting, and are handled confidentially.</p>
                </details>
                <details class="faq-item">
                    <summary>Can I pause and continue later?</summary>
                    <p>Yes. Use Save for Later and keep your resume code so you can continue where you left off.</p>
                </details>
                <details class="faq-item">
                    <summary>How long does the survey take?</summary>
                    <p>Most alumni complete the survey within 15-20 minutes.</p>
                </details>
                <details class="faq-item">
                    <summary>Who can answer this tracer study?</summary>
                    <p>It is intended for ADDU alumni who are invited to provide post-graduation outcomes and feedback.</p>
                </details>
            </div>
        </div>
    </section>
</div>
@endsection