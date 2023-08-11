@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <i class="far fa-copy copy-icon" title="Copy to clipboard"></i>

    <div class="copy-text">{!! $post->description!!}</div>

</div>
@endsection
@push('style')
<style>
    .copy-icon {
      cursor: pointer;
    }

    .copied::before {
      content: "Copied!";
      display: inline-block;
      position: absolute;
      top: -28px;
      left: 30px;
      font-size: 14px;
      font-weight: bold;
      color: #008000;
    }
  </style>
@endpush
@push('script')
<script>
    const copyIcon = document.querySelector('.copy-icon');
  const copyText = document.querySelector('.copy-text');

  copyIcon.addEventListener('click', () => {
    const htmlToCopy = copyText.outerHTML;
    navigator.clipboard.writeText(htmlToCopy);
    copyIcon.classList.add('copied');
    copyIcon.setAttribute('title', 'Copied!');
    setTimeout(() => {
      copyIcon.classList.remove('copied');
      copyIcon.setAttribute('title', 'Copy to clipboard');
    }, 2000);
  });

    console.log(navigator.clipboard);

  </script>
@endpush
