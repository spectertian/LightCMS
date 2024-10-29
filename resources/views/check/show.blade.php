<!-- resources/views/reports/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="report-container">
            <!-- 报告头部 -->
            <div class="report-header">
                <div class="logo">
{{--                    <img src="{{ asset('images/logo.png') }}" alt="公司logo">--}}
                </div>
                <div class="company-info">
                    <h2>检测报告</h2>
{{--                    <p>XXX检测中心</p>--}}
                </div>
            </div>

            <!-- 报告基本信息 -->
            <div class="report-info">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">报告编号：</th>
                        <td>{{ $report->report_id }}</td>
                        <th width="150">报告日期：</th>
                        <td>{{ $report->report_date }}</td>
                    </tr>
                    <tr>
                        <th>委托方：</th>
                        <td>{{ $report->client_name }}</td>
                        <th>委托方地址：</th>
                        <td>{{ $report->client_address }}</td>
                    </tr>
                    <tr>
                        <th>样品名称：</th>
                        <td>{{ $report->sample_name }}</td>
                        <th>型号规格：</th>
                        <td>{{ $report->model_spec }}</td>
                    </tr>
                    <tr>
                        <th>接收日期：</th>
                        <td>{{ $report->receive_date }}</td>
                        <th>检测日期：</th>
                        <td>{{ $report->test_date}}</td>
                    </tr>
                </table>
            </div>

            <!-- 报告内容 -->
            <div class="report-content">
                <!-- 这里可以添加检测内容、结果等 -->
            </div>

            <!-- 报告底部 -->
            <div class="report-footer">
                <div class="signatures">
                    <div class="signature-item">
                        <p>检测人：______________</p>
                        <p>日期：________________</p>
                    </div>
                    <div class="signature-item">
                        <p>审核人：______________</p>
                        <p>日期：________________</p>
                    </div>
                </div>
                <div class="stamp-area">
                    <!-- 公章位置 -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .report-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .report-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #333;
        }

        .logo {
            width: 150px;
            margin-right: 30px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        .company-info {
            flex: 1;
        }

        .company-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .report-info {
            margin-bottom: 30px;
        }

        .report-content {
            margin-bottom: 50px;
        }

        .report-footer {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #ddd;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .signature-item {
            text-align: center;
        }

        .stamp-area {
            text-align: right;
            margin-top: 30px;
        }

        @media print {
            .container {
                width: 100%;
                max-width: none;
            }
        }
    </style>
@endsection