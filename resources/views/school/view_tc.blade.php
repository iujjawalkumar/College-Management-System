@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Print TC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">TC</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-12" id="printableArea">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:"Nirmala UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:.5in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:.5in;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:7.1pt 1.0in 11.6pt 1.0in;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>

</head>

<body bgcolor="#D9E2F3" lang=EN-US style='word-wrap:break-word'>

<div class=WordSection1>

<p class=MsoNormal align=left style='margin-bottom:0in;text-align:left;
line-height:150%'><span style='position:absolute;z-index:-1895821312;
left:0px;margin-left:-28px;margin-top:19px;width:99px;height:99px'><img
width=99 height=99 src="{{asset('storage/images/'.substr($data->school_image, 14))}}"></span><span style='position:
absolute;z-index:-1895822336;left:0px;margin-left:537px;margin-top:13px;
width:111px;height:111px'><img width=111 height=111 src="{{asset('storage/images/'.substr($data->school_image, 14))}}"></span><b><span
style='font-size:20.0pt;line-height:150%;font-family:"Times New Roman",serif'>S.P.M.
PUBLIC SCHOOL</span></b></p>

<p class=MsoNormal align=left style='margin-bottom:0in;text-align:left;
line-height:150%'><span style='font-family:"Times New Roman",serif'>SHAHI
MARKET, GOLGHAR, GORAKHPUR</span></p>

<p class=MsoNormal align=left style='margin-bottom:0in;text-align:left;
line-height:200%'><span style='position:absolute;z-index:251659264;left:0px;
margin-left:160px;margin-top:31px;width:280px;height:29px'><img width=280
height=29 src="{{asset('storage/images/'.substr($data->school_image, 14))}}"></span><span style='font-family:"Times New Roman",serif'>Affiliated
to Central Board of Secondary Education, New Delhi</span></p>

<p class=MsoNormal align=left style='text-align:left;line-height:200%'><b><span
style='font-family:"Nirmala UI",sans-serif'>स्थानांतरण</span></b><b><span
style='font-family:"Times New Roman",serif'> </span></b><b><span
style='font-family:"Nirmala UI",sans-serif'>प्रमाणपत्र</span></b><b><span
style='font-family:"Times New Roman",serif'> / Transfer Certificate</span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%'><b><span
style='font-family:"Times New Roman",serif'>School / Affiliation No. :</span></b><span
style='font-family:"Times New Roman",serif'>                      <b>Book No. :</b>                   <b>S.R.
No. :</b></span></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%'><b><span
style='font-family:"Times New Roman",serif'>Admission No. :</span></b><span
style='font-family:"Times New Roman",serif'>                       <b>Registration
No. of the candidate (in case Class IX to X) :</b> </span></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%'><span
style='position:absolute;z-index:251663360;margin-left:-18px;margin-top:31px;
width:658px;height:1px'><img width=658 height=1 src="TC_files/image004.png"></span><b><span
style='font-family:"Times New Roman",serif'>Class from</span></b><span
style='font-family:"Times New Roman",serif'> …………………………………………..…….. <b>to </b>………………………………………..</span></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:150%'><span
style='font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छात्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>का</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>नाम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Name of the Pupil :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>2.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>माता</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>का</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>नाम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Mother’s Name :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>3.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>पिता</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>का</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>नाम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Father’s Name :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>4.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>राष्ट्रीयता</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Nationality :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>5.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>क्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छात्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अनुसूचित</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>जाति</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>/</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अनुसूचित</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>जनजाति</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>/</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अन्य</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>पिछड़ा</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>वर्ग</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>से</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>संबंधित</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>है</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Whether the pupil belong to SC/ST/OBC Category :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>6.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>प्रवेश</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>रजिस्टर</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>के</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अनुसार</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>जन्म</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>तिथि</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Date of Birth according to the Admission Register :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>7.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>क्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>विद्यार्थी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अनुत्तीर्ण</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>है</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Whether the Student is failed :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>8.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>विषय</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>पेशकश</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Subject Offered :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>9.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>वह</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कक्षा</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>जिसमें</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छात्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>ने</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अंतिम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>बार</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अध्ययन</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>किया</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>था</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
(</span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>शब्दों</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>में</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>)
/ Class in which the pupil last studied (in words) :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>10.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>स्कूल</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>/</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>बोर्ड</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अंतिम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>बार</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>ली</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>गई</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>वार्षिक</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>परीक्षा</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>परिणाम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>के</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>साथ</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ School / Board Annual examination last taken with result :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>11.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>क्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अगली</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>उच्च</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कक्षा</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>में</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>प्रोन्नति</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>के</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>योग्य</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>हैं</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Whether qualified for promotion to the next higher class :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>12.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>क्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छात्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>ने</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>स्कूल</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>सभी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>फीस</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>का</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>भुगतान</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>किया</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>है</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Whether the pupil paid all fees of school :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>13.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>क्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छात्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>को</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>शुल्क</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>में</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कोई</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>रियायत</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>दी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>गई</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>थी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>,
</span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>यदि</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>हां</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>,
</span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>तो</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>रियायत</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>प्रकृति</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Whether the pupil was granted any fee concession, if so, the nature of
concession :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>14.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>क्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छात्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>एनसीसी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कैडेट</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>/</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>ब्वॉय</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>स्काउट</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>/</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>गर्ल</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>गाइड</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>है</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
(</span><span style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>विवरण</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>दें</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>)
/ Whether the pupil NCC Cadet/Boy Scout / Girl Guide (give details) :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>15.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>स्कूल</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>छोड़ने</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>का</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कारण</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Reason for leaving the school :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>16.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अंतिम</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>तिथि</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>तक</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>उपस्थितियो</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कुल</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>संख्या</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> 
/ No. of meetings  up to Date :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>17.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>विद्यार्थी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>विद्यालय</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>दिवसों</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कुल</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>उपस्थितिया</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> 
/ No. of days the pupil at ended :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>18.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>सामान्य</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>आचरण</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ General Conduct :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>19.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>कोई</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>अन्य</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>टिप्पणी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Any other remarks :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;text-indent:-14.2pt;
line-height:150%'><span style='font-size:10.0pt;line-height:150%;font-family:
"Times New Roman",serif'>20.<span style='font:7.0pt "Times New Roman"'> </span></span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>प्रमाण</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>पत्र</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>जारी</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>करने</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>की</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'> </span><span
style='font-size:10.0pt;line-height:150%;font-family:"Nirmala UI",sans-serif'>तिथि</span><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
/ Date of issue of certificate :</span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:7.1pt;line-height:150%'><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoListParagraphCxSpLast style='margin-left:7.1pt;line-height:150%'><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal style='line-height:150%'><b><span style='font-family:"Times New Roman",serif'>___________                              
___________                        _________________________</span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:normal'><b><span
style='font-family:"Times New Roman",serif'>Prepared by                                Checked
by                          Sign of Principal with official Seal</span></b></p>

<p class=MsoNormal style='margin-bottom:0in;line-height:normal'><span
style='font-size:8.0pt;font-family:"Times New Roman",serif'>(Name &amp;
Designation)                                 (Name &amp; Designation)</span></p>

<p class=MsoNormal style='line-height:150%'><span style='position:relative;
z-index:251660288;left:-33px;top:20px;width:675px;height:21px'><img width=675
height=1 src="TC_files/image005.png"></span><span style='font-family:"Times New Roman",serif'>&nbsp;</span></p>

<br clear=ALL>

<p class=MsoNormal align=left style='text-align:left;line-height:150%'><b><span
style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>Note
:</span></b><span style='font-size:10.0pt;line-height:150%;font-family:"Times New Roman",serif'>
If, this T.C. is issued by the officiating / incharge Principal, in variable
countersigned by the manager</span></p>

</div>


      
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href=" " onclick="printDiv('printableArea')" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


    </script>

@endsection