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
        position: relative;
        font-family: 'Source Sans 3', sans-serif;
        background:
            radial-gradient(circle at top right, rgba(11, 88, 196, 0.12), transparent 28%),
            radial-gradient(circle at bottom left, rgba(245, 184, 0, 0.16), transparent 24%),
            linear-gradient(180deg, #f4f7fc 0%, #eef3fb 45%, #ffffff 100%);
    }

    .welcome-page .title-font {
        font-family: 'Montserrat', sans-serif;
    }

    .welcome-page .page-shell {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(247, 250, 255, 0.98) 100%);
        box-shadow: 0 24px 50px rgba(0, 42, 99, 0.14);
    }

    .welcome-page .hero-panel {
        background: linear-gradient(135deg, #00244f 0%, var(--addu-blue) 52%, var(--addu-blue-bright) 100%);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-bottom-left-radius: 1.25rem;
        border-bottom-right-radius: 1.25rem;
        box-shadow: 0 24px 48px rgba(0, 42, 99, 0.28);
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
        background: rgba(245, 184, 0, 0.24);
    }

    .welcome-page .hero-glow-b {
        width: 230px;
        height: 230px;
        left: -60px;
        bottom: -60px;
        background: rgba(158, 27, 50, 0.16);
    }

    .welcome-page .badge {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.24);
        color: #fff;
    }

    .welcome-page .time-chip {
        background: linear-gradient(90deg, var(--addu-gold) 0%, var(--addu-gold-deep) 100%);
        color: #172741;
    }

    .welcome-page .action-card {
        background: #ffffff;
        border: 1px solid #d8e3f7;
        box-shadow: 0 16px 36px rgba(17, 36, 63, 0.14);
        border-radius: 1.25rem;
        align-self: start;
        max-width: 460px;
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
        box-shadow: 0 10px 24px rgba(17, 36, 63, 0.08);
        padding: 1.25rem;
        min-height: 100%;
    }

    .welcome-page .info-card .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border-radius: 9999px;
        padding: 0.3rem 0.65rem;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--addu-blue);
        background: #edf3ff;
    }

    .welcome-page .privacy-panel {
        border: 1px solid #c6d7f4;
        background: linear-gradient(90deg, #eef4ff 0%, #fff7dc 100%);
    }

    .welcome-page .content-panel {
        background: linear-gradient(180deg, #f8fbff 0%, #eef4fb 100%);
        border-top: 1px solid rgba(214, 225, 243, 0.8);
    }

    .welcome-page .content-surface {
        background: rgba(255, 255, 255, 0.88);
        border: 1px solid #dbe5f6;
        border-radius: 1.5rem;
        box-shadow: 0 12px 26px rgba(17, 36, 63, 0.06);
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
        box-shadow: 0 10px 22px rgba(17, 36, 63, 0.08);
        padding: 1.1rem;
    }

    .welcome-page .timeline-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .welcome-page .timeline-step {
        border: 1px solid #e1e8f4;
        border-radius: 12px;
        background: linear-gradient(180deg, #ffffff 0%, #f8faff 100%);
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
        box-shadow: 0 10px 22px rgba(17, 36, 63, 0.08);
        padding: 1.1rem;
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

    @media (min-width: 1024px) {
        .welcome-page .intro-grid {
            grid-template-columns: 1.3fr 0.9fr;
        }
    }

    .welcome-page .hero-logo {
        position: absolute;
        right: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        width: 160px;
        height: auto;
    }

    @media (max-width: 640px) {
        .welcome-page .hero-logo { display: none; }
    }

    .welcome-page .modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(8, 20, 43, 0.72);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        z-index: 50;
    }

    .welcome-page .modal-backdrop[hidden] {
        display: none;
    }

    .welcome-page .consent-modal {
        width: min(100%, 38rem);
        border-radius: 1.5rem;
        background: #fff;
        box-shadow: 0 32px 80px rgba(0, 0, 0, 0.28);
        border: 1px solid #dbe5f6;
        overflow: hidden;
    }

    .welcome-page .consent-modal-header {
        background: linear-gradient(135deg, var(--addu-blue) 0%, var(--addu-blue-deep) 100%);
        color: #fff;
        padding: 1.2rem 1.4rem;
    }

    .welcome-page .consent-modal-body {
        padding: 1.35rem 1.4rem 1rem;
        color: var(--addu-ink);
    }

    .welcome-page .consent-modal-footer {
        padding: 0 1.4rem 1.4rem;
    }

    .welcome-page .consent-copy {
        border: 1px solid #dbe5f6;
        border-radius: 1rem;
        background: #f8fbff;
        padding: 1rem;
    }

    .welcome-page .modal-close {
        color: rgba(255, 255, 255, 0.9);
    }
</style>

<div class="welcome-page min-h-screen px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
    <div class="page-shell mx-auto max-w-4xl rounded-[2rem]">
    <section class="relative overflow-hidden rounded-[1.75rem] hero-panel text-white">
        <div class="hero-glow-a"></div>
        <div class="hero-glow-b"></div>

        <div class="relative grid gap-7 px-6 py-10 sm:px-10 sm:py-12 lg:grid-cols-[1.05fr_0.95fr] lg:items-start lg:px-12 lg:py-13">
            <img src="{{ asset('images/ADDU-SEAL-Colored.png') }}" alt="Ateneo de Davao University logo" class="hero-logo">
            <div>
                <h1 class="title-font mt-5 text-3xl font-extrabold leading-tight sm:text-4xl lg:text-5xl">
                    ADDU Alumni
                    <span class="block" style="color: #f5b800;">Tracer Study</span>
                </h1>

                <p class="mt-4 max-w-xl text-base leading-relaxed text-white/90 sm:text-lg">
                    Your story after graduation helps us improve learning, career preparation, and alumni support for future Ateneans.
                </p>

                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <span class="time-chip inline-flex items-center rounded-full px-4 py-2 text-xs font-bold sm:text-sm">
                        15-20 minutes to complete
                    </span>
                    <span class="badge inline-flex items-center rounded-full px-4 py-2 text-xs font-semibold sm:text-sm">
                        One raffle entry for an Ateneo Jacket
                    </span>
                </div>
            </div>

            <aside class="action-card rounded-2xl p-5 sm:p-6 self-start">
                <h2 class="title-font text-xl font-bold text-main sm:text-2xl">Ready to begin?</h2>
                <p class="mt-2 text-sm leading-relaxed text-muted sm:text-base">
                   Before starting the survey, please ensure that you have read the Data Privacy Notice and Consent.
                </p>
                <button
                    type="button"
                    id="openConsentModal"
                    class="start-btn mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl px-6 py-3 text-base font-bold transition sm:text-lg"
                >
                    Read the Data Privacy Notice and Consent
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
                <p class="mt-3 text-center text-xs text-slate-500 sm:text-sm">You can save your progress and resume later.</p>
            </aside>
        </div>
    </section>

    <div class="modal-backdrop" id="consentModal" hidden aria-hidden="true">
        <div class="consent-modal" role="dialog" aria-modal="true" aria-labelledby="consentModalTitle">
            <div class="consent-modal-header flex items-start justify-between gap-4">
                <div>
                    <h2 id="consentModalTitle" class="title-font text-2xl font-bold">Data Privacy Notice and Consent</h2>
                    <p class="mt-1 text-sm text-white/85">Please review the notice before starting the survey.</p>
                </div>
                <button type="button" id="closeConsentModal" class="modal-close text-2xl leading-none" aria-label="Close dialog">&times;</button>
            </div>
            <div class="consent-modal-body">
                <div class="consent-copy space-y-3 text-sm leading-relaxed sm:text-base">
                    <p class="font-semibold uppercase tracking-[0.12em] text-[#003a8c]">Opt-In</p>
                    <p class="text-xl font-bold text-main">Data Privacy Notice and Consent</p>
                    <p>
                        By proceeding with this Alumni Tracer Study Survey, you acknowledge and agree that the information you provide will be collected, processed, stored, and used by the institution in accordance with the provisions of the Philippine Data Privacy Act of 2012 (Republic Act No. 10173).
                    </p>
                    <p>
                        The collected data shall be used solely for:
                    </p>
                    <ul class="list-disc space-y-1 pl-5">
                        <li>alumni tracking and employability assessment,</li>
                        <li>curriculum improvement and academic research,</li>
                        <li>institutional accreditation and quality assurance,</li>
                        <li>statistical analysis and reporting purposes.</li>
                    </ul>
                    <p>
                        Your personal information shall be treated with strict confidentiality and protected through appropriate organizational, physical, and technical security measures.
                    </p>
                    <p>
                        The institution shall not disclose your personal data to unauthorized third parties without your consent unless required by law.
                    </p>
                    <p>
                        By clicking the <span class="font-semibold">Start Survey</span> button you confirm that:
                    </p>
                    <ul class="list-disc space-y-1 pl-5">
                        <li>the information you provided is true and accurate;</li>
                        <li>you voluntarily consent to the collection and processing of your data;</li>
                        <li>you understand your rights under the Data Privacy Act, including the right to access, correct, and withdraw your information.</li>
                    </ul>
                    <p class="text-xs text-muted sm:text-sm">
                        This consent is required before proceeding to the survey.
                    </p>
                </div>
            </div>
            <div class="consent-modal-footer">
                <a
                    href="{{ url('/survey') }}"
                    class="start-btn inline-flex w-full items-center justify-center gap-2 rounded-xl px-6 py-3 text-base font-bold transition sm:text-lg"
                >
                    Start Survey
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <section class="content-panel px-4 pb-6 pt-5 sm:px-5 sm:pb-7">
        <div class="content-surface p-4 sm:p-5">
            <div class="grid gap-4 md:grid-cols-2">
                <article class="info-card">
                    <div class="eyebrow">About</div>
                    <h3 class="title-font mt-3 text-xl font-bold text-main sm:text-2xl">About This Study</h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted sm:text-base">
                        The tracer study gathers insights on career paths, achievements, and alumni experiences to improve academic programs and institutional services.
                    </p>
                </article>

                <article class="info-card">
                    <div class="eyebrow">Time</div>
                    <h3 class="title-font mt-3 text-xl font-bold text-main sm:text-2xl">Time Commitment</h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted sm:text-base">
                        The survey takes around <span class="font-bold" style="color: #11243f;">15-20 minutes</span>.
                        Please complete it in one sitting if possible.
                    </p>
                </article>
            </div>

            <article class="info-card mt-4">
                <div class="eyebrow">Incentive</div>
                <h3 class="title-font mt-3 text-xl font-bold text-main sm:text-2xl">Prize Incentive</h3>
                <p class="mt-2 text-sm leading-relaxed text-muted sm:text-base">
                    Every completed response receives one raffle entry for a chance to win an
                    <span class="font-bold" style="color: #11243f;">Ateneo Jacket</span>.
                </p>
            </article>

            <div class="privacy-panel mt-4 rounded-2xl p-4">
                <p class="text-sm leading-relaxed text-muted">
                    <span class="font-bold" style="color: #003a8c;">Privacy Note:</span>
                    All responses are collected anonymously and will be used solely for research and institutional improvement purposes.
                </p>
            </div>

            <div class="timeline-shell mt-4">
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
                        <p class="mt-2 text-sm text-muted">Tell us about work outcomes and ADDU relevance.</p>
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

            <div class="faq-shell mt-4">
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
        </div>
    </section>
    </div>
</div>

<script>
    (function () {
        const openButton = document.getElementById('openConsentModal');
        const closeButton = document.getElementById('closeConsentModal');
        const modal = document.getElementById('consentModal');

        if (!openButton || !closeButton || !modal) {
            return;
        }

        const openModal = () => {
            modal.hidden = false;
            modal.setAttribute('aria-hidden', 'false');
        };

        const closeModal = () => {
            modal.hidden = true;
            modal.setAttribute('aria-hidden', 'true');
        };

        openButton.addEventListener('click', openModal);
        closeButton.addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !modal.hidden) {
                closeModal();
            }
        });
    })();
</script>
@endsection