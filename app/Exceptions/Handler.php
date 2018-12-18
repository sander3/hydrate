<?php

namespace App\Exceptions;

use App;
use Exception;
use App\Mail\ExceptionReport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        if ($this->shouldntReport($e)) {
            return;
        }

        if (method_exists($e, 'report')) {
            return $e->report();
        }

        if (!config('app.debug')) {
            $this->sendExceptionReportMail($e);
        }

        Log::channel('daily')->error(
            $e->getMessage(),
            array_merge($this->context(), ['exception' => $e])
        );
    }

    /**
     * Send an exception report mail.
     *
     * @param  \Exception  $exception
     * @return void
     */
    private function sendExceptionReportMail(Exception $exception)
    {
        $request = App::runningInConsole() ? false : request();

        Mail::to(config('app.exception_report_recipient'))
            ->send(new ExceptionReport($request, $exception));
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render(
        $request,
        Exception $exception
    ) {
        return parent::render($request, $exception);
    }
}
