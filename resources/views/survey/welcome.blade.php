@extends('layouts.app')

@section('title', 'ADDU Alumni Tracer Study')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4">
    <div class="max-w-2xl w-full bg-white rounded-lg shadow-lg p-8 text-center">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#003087] mb-4">ADDU Alumni Tracer Study</h1>
            <div class="w-16 h-1 bg-[#003087] mx-auto mb-6"></div>
        </div>

        <div class="text-left space-y-6 mb-8">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-3">About This Study</h2>
                <p class="text-gray-600 leading-relaxed">
                    The ADDU Alumni Tracer Study is designed to gather valuable insights about the career paths,
                    achievements, and experiences of our alumni community. Your participation will help us understand
                    how our educational programs contribute to professional success and lifelong learning.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Time Commitment</h2>
                <p class="text-gray-600 leading-relaxed">
                    This survey typically takes <strong class="text-[#003087]">15-20 minutes</strong> to complete.
                    Please ensure you have sufficient time available before beginning.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Prizes!</h2>
                <p class="text-gray-600 leading-relaxed">
                    Everyone who completes this tracer study is entitled to one (1) entry into a raffle draw for a chance to win an <strong class="text-[#003087]">Ateneo Jacket</strong>.
                </p>
            </div>

            <div class="bg-blue-50 border-l-4 border-[#003087] p-4">
                <p class="text-gray-700">
                    <strong>Privacy Note:</strong> All responses are collected anonymously and will be used solely
                    for research and institutional improvement purposes.
                </p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/survey') }}"
               class="inline-flex items-center justify-center px-8 py-3 bg-[#003087] text-white font-semibold rounded-lg hover:bg-blue-900 transition-colors duration-200">
                Start Survey
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection