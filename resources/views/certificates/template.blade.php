<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sertifikat Kelulusan</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
        }

        .certificate {
            border: 10px solid #2563eb;
            padding: 50px;
            margin: 20px;
        }

        .title {
            font-size: 50px;
            color: #1e3a8a;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .subtitle {
            font-size: 24px;
            color: #475569;
            margin-bottom: 40px;
        }

        .name {
            font-size: 40px;
            color: #0f172a;
            border-bottom: 2px solid #cbd5e1;
            display: inline-block;
            padding: 0 40px 10px;
            margin-bottom: 40px;
        }

        .course {
            font-size: 30px;
            color: #2563eb;
            margin-bottom: 40px;
        }

        .footer {
            font-size: 16px;
            color: #64748b;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="title">Sertifikat Kelulusan</div>
        <div class="subtitle">Diberikan Kepada</div>
        <div class="name">{{ $user->name }}</div>
        <div class="subtitle">Atas kelulusannya dalam kuis</div>
        <div class="course">{{ $quiz->title }} - {{ $course->title }}</div>

        <div class="footer">
            <p>ID Sertifikat: {{ $certificate->certificate_number }}</p>
            <p>Diterbitkan pada: {{ \Carbon\Carbon::parse($certificate->issued_at)->format('d F Y') }}</p>
        </div>
    </div>
</body>

</html>