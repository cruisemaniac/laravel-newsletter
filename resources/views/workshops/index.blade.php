@extends('layouts.app')

@section('title', 'The Devops List')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Workshops & Training</div>

        <div class="panel-body">
            <p>We're a team of experienced DevOps professionals with experience working with the latest technologies that move the cloud computing space.</p>
            <p>We'd love to share our knowledge with you folks and help you up the curve with customised training and curated content</p>
            <br>
            <p>Contact us at {{ Html::mailto('workshops@devopslist.com', 'here') }} and we'll get started!</p>
            <p>You can also reach us at +91 8300143016 for more information.</p>

        </div>
    </div>
</div>
@endsection
