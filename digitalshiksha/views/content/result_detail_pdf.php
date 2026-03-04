<?php
$CI =& get_instance();
$theme_primary = $CI->session->userdata('primary_color') ?: '#2c3e50';
$theme_accent_alt = $CI->session->userdata('accent_color_alt') ?: '#F1B900';
$header_brand_name = ($brand_name) ? $brand_name : 'Digital Shiksha';
$exam_code = 'MT' . str_pad((string)$results->title_id, 3, '0', STR_PAD_LEFT);
$total_questions = is_array($all_questions) ? count($all_questions) : 0;
$is_qualified = ((float)$results->result_percent >= (float)$results->pass_mark);
$candidate_percent = max(0, min(100, (float)$results->result_percent));
$passing_percent = max(0, min(100, (float)$results->pass_mark));
$devanagari_font_path = FCPATH . 'assets/fonts/Lohit-Devanagari.ttf';
if (!file_exists($devanagari_font_path) && file_exists('/usr/share/fonts/truetype/lohit-devanagari/Lohit-Devanagari.ttf')) {
    $devanagari_font_path = '/usr/share/fonts/truetype/lohit-devanagari/Lohit-Devanagari.ttf';
}
$devanagari_font_data_uri = '';
if (file_exists($devanagari_font_path) && is_readable($devanagari_font_path)) {
    $devanagari_font_data_uri = 'data:font/truetype;base64,' . base64_encode(file_get_contents($devanagari_font_path));
}

$default_student_photo = base_url('uploads/user-avatar/avatar-placeholder.jpg');
$student_photo_url = $default_student_photo;

if (!empty($results->user_photo)) {
    $new_photo_path = FCPATH . 'uploads/user-avatar/' . $results->user_photo;
    $old_photo_path = FCPATH . 'user-avatar/' . $results->user_photo;

    if (file_exists($new_photo_path)) {
        $student_photo_url = base_url('uploads/user-avatar/' . $results->user_photo);
    } elseif (file_exists($old_photo_path)) {
        $student_photo_url = base_url('user-avatar/' . $results->user_photo);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Result Certificate</title>
    <style>
        <?php if ($devanagari_font_data_uri !== ''): ?>
        @font-face {
            font-family: 'LohitDevanagari';
            font-style: normal;
            font-weight: 400;
            src: url("<?= $devanagari_font_data_uri ?>") format("truetype");
        }
        <?php endif; ?>

        @page {
            size: A4;
            margin: 10mm 10mm;
        }

        body {
            font-family: 'LohitDevanagari', 'DejaVu Sans', Helvetica, Arial, sans-serif;
            font-size: 11px;
            color: #1f2933;
            margin: 0;
            line-height: 1.3;
        }

        .watermark {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
        }

        .watermark-table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }

        .watermark-table td {
            width: 33.33%;
            height: 33.33%;
            border: 0;
            text-align: center;
            vertical-align: middle;
        }

        .watermark-text {
            display: inline-block;
            transform: rotate(-30deg);
            font-size: 42px;
            font-weight: 800;
            letter-spacing: 2px;
            color: <?= $theme_primary ?>;
            opacity: 0.09;
            white-space: nowrap;
        }

        .certificate {
            border: 3px solid <?= $theme_accent_alt ?>;
            padding: 12px;
            min-height: 268mm;
            page-break-inside: avoid;
            position: relative;
            z-index: 2;
        }

        .certificate-heading {
            text-align: center;
            margin: 2px 0 10px;
            font-family: "DejaVu Serif", "Times New Roman", Georgia, serif;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 1.4px;
            color: <?= $theme_primary ?>;
            text-transform: uppercase;
            line-height: 1.15;
        }

        .heading-divider {
            width: 68%;
            margin: 0 auto 10px;
            border-top: 2px solid <?= $theme_accent_alt ?>;
        }

        .header {
            text-align: center;
            border-bottom: 0;
            padding-bottom: 8px;
            padding-top: 6px;
            margin-top: 2px;
            margin-bottom: 14px;
        }

        .brand-table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .brand-table td {
            border: 0;
            padding: 0;
            vertical-align: middle;
            text-align: center;
            white-space: nowrap;
        }

        .brand img {
            width: 40px;
            height: 40px;
            display: block;
            margin-right: 9px;
        }

        .brand .name {
            font-size: 24px;
            font-weight: 900;
            color: <?= $theme_accent_alt ?>;
            letter-spacing: -0.2px;
            white-space: nowrap;
        }

        .panel-wrap {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
            page-break-inside: avoid;
        }

        .panel-cell {
            width: 100%;
            vertical-align: top;
            border: 1px solid #d7dde5;
            border-radius: 6px;
            padding: 0;
        }

        .panel-row-space {
            height: 12px;
        }

        .panel-title {
            background: <?= $theme_primary ?>;
            color: #ffffff;
            padding: 8px 10px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .panel-body {
            padding: 16px 14px 15px;
        }

        .student-top {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .student-top td {
            vertical-align: top;
            border: 0;
            padding: 0;
        }

        .student-photo-wrap {
            width: 74px;
            text-align: right;
        }

        .student-photo {
            width: 62px;
            height: 62px;
            border: 2px solid #d7dde5;
            border-radius: 50%;
            object-fit: cover;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }

        .detail-table td {
            padding: 10px 0;
            border-bottom: 1px dashed #d8dee6;
            vertical-align: top;
            font-size: 11px;
        }

        .detail-table tr:last-child td {
            border-bottom: 0;
        }

        .label {
            width: 45%;
            color: #5b6673;
            font-weight: 700;
        }

        .value {
            color: #1f2933;
            font-weight: 600;
        }

        .exam-title-img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
        }

        .result-strip {
            margin: 0;
            border: 1px solid #d8dee6;
            padding: 12px;
            background: #fafbfd;
            page-break-inside: avoid;
        }

        .result-title {
            text-align: center;
            color: <?= $theme_primary ?>;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 10px;
        }

        .assessment {
            text-align: center;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .assessment-table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .assessment-table td {
            border: 0;
            padding: 0;
            vertical-align: middle;
            white-space: nowrap;
        }

        .assessment-label-text {
            margin-right: 4px;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            vertical-align: middle;
            margin-left: 4px;
        }

        .pass { background: <?= $theme_primary ?>; color: #fff; }
        .fail { background: #a94442; color: #fff; }

        .scores {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }

        .scores th,
        .scores td {
            border: 1px solid #333;
            padding: 9px 10px;
            text-align: left;
            font-size: 11px;
        }

        .scores th {
            width: 45%;
            background: #f4f6f9;
            color: <?= $theme_primary ?>;
            font-weight: 700;
        }

        .result-footer-block {
            page-break-inside: avoid;
        }

        .signature {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            page-break-inside: avoid;
        }

        .signature td {
            width: 50%;
            border: 0;
            text-align: center;
            padding-top: 28px;
            font-size: 11px;
            color: #3d4752;
        }

        .line {
            width: 70%;
            border-top: 1px solid #3b3b3b;
            margin: 0 auto 6px;
        }

        .footer-note {
            margin-top: 16px;
            border: 1px solid #d8dee6;
            background: #f8fafc;
            padding: 8px 10px;
            font-size: 10px;
            color: #4b5563;
            text-align: left;
            line-height: 1.45;
            page-break-inside: avoid;
        }

        .footer-note strong {
            color: <?= $theme_primary ?>;
            font-size: 11px;
            margin-right: 4px;
        }
    </style>
</head>
<body>
    <div class="watermark">
        <table class="watermark-table">
            <tr>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
            </tr>
            <tr>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
            </tr>
            <tr>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
                <td><span class="watermark-text"><?= strtoupper(htmlspecialchars($header_brand_name)) ?></span></td>
            </tr>
        </table>
    </div>
    <div class="certificate">
        <div class="certificate-heading">CERTIFICATE OF COMPETENCY</div>
        <div class="heading-divider"></div>

        <div class="header">
            <table class="brand-table">
                <tr>
                    <td>
                        <div class="brand">
                            <img src="<?= base_url('assets/images/favicon.png') ?>" alt="Logo">
                        </div>
                    </td>
                    <td>
                        <div class="brand">
                            <span class="name"><?= htmlspecialchars($header_brand_name) ?></span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <table class="panel-wrap">
            <tr>
                <td class="panel-cell">
                    <div class="panel-title">Student Detail</div>
                    <div class="panel-body">
                        <table class="student-top">
                            <tr>
                                <td>
                                    <table class="detail-table">
                                        <tr><td class="label">Name</td><td class="value"><?= htmlspecialchars($results->user_name) ?></td></tr>
                                        <tr><td class="label">Email</td><td class="value"><?= htmlspecialchars($results->user_email) ?></td></tr>
                                        <tr><td class="label">Phone</td><td class="value"><?= htmlspecialchars($results->user_phone) ?></td></tr>
                                    </table>
                                </td>
                                <td class="student-photo-wrap">
                                    <img src="<?= $student_photo_url ?>" alt="Student Photo" class="student-photo">
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr><td class="panel-row-space"></td></tr>
            <tr>
                <td class="panel-cell">
                    <div class="panel-title">Competency Detail</div>
                    <div class="panel-body">
                        <table class="detail-table">
                            <tr>
                                <td class="label">Exam Title</td>
                                <td class="value">
                                    <?php if (!empty($exam_title_image)): ?>
                                        <img src="<?= $exam_title_image ?>" alt="<?= htmlspecialchars((string)$results->title_name, ENT_QUOTES, 'UTF-8') ?>" class="exam-title-img">
                                    <?php else: ?>
                                        <?= htmlspecialchars((string)$results->title_name, ENT_QUOTES, 'UTF-8') ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr><td class="label">Exam Code</td><td class="value"><?= $exam_code ?></td></tr>
                            <tr><td class="label">Exam Date</td><td class="value"><?= date('d M Y', strtotime($results->exam_taken_date)) ?></td></tr>
                            <tr><td class="label">Passing Score</td><td class="value"><?= (float)$results->pass_mark ?>%</td></tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

        <div class="result-footer-block">
            <div class="result-strip">
                <div class="result-title">Result</div>
                <div class="assessment">
                    <table class="assessment-table">
                        <tr>
                            <td><span class="assessment-label-text">Assessment :</span></td>
                            <td>
                                <?php if ($is_qualified): ?>
                                    <span class="badge pass">Qualified</span>
                                <?php else: ?>
                                    <span class="badge fail">Not Qualified</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <table class="scores">
                    <tr><th>Candidate Score</th><td><?= $candidate_percent ?>%</td></tr>
                    <tr><th>Passing Score</th><td><?= $passing_percent ?>%</td></tr>
                </table>
            </div>

            <table class="signature">
                <tr>
                    <td>
                        <div class="line"></div>
                        Student Signature
                    </td>
                    <td>
                        <div class="line"></div>
                        Authorized Signature
                    </td>
                </tr>
            </table>

            <div class="footer-note">
                <strong>Note :</strong> This certificate is generated by <?= htmlspecialchars($header_brand_name) ?> and is valid as per platform terms.
            </div>
        </div>
    </div>
</body>
</html>
