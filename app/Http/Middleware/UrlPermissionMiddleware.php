<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\Session;

    class UrlPermissionMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Closure                 $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {

            if($request->segment(1) === 'purchase-orders') {


                if(!in_array('PURCHASE_ORDER_ACCESS', Session::get('permissions'))) {

                    if(in_array('PURCHASE_ORDER_VIEW', Session::get('permissions')) || in_array('PURCHASE_ORDER_MODIFY', Session::get('permissions')) || in_array('PURCHASE_ORDER_REPORTS_VIEW', Session::get('permissions'))) {
                        if($request->segment(1) === 'purchase-orders' && $request->segment(2) === 'view') {
                            if(!in_array('PURCHASE_ORDER_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }

                        } elseif($request->segment(1) === 'purchase-orders' && $request->segment(2) === 'edit') {
                            if(!in_array('PURCHASE_ORDER_MODIFY', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        } elseif($request->segment(1) === 'purchase-orders' && $request->segment(2) === 'view') {

                            if(!in_array('PURCHASE_ORDER_REPORTS_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        }
                    } else {
                        return redirect('/');
                    }


                }


            }
            if($request->segment(1) === 'sales-orders') {


                if(!in_array('SALES_ORDER_ACCESS', Session::get('permissions'))) {

                    if(in_array('SALES_ORDER_VIEW', Session::get('permissions')) || in_array('SALES_ORDER_MODIFY', Session::get('permissions')) || in_array('SALES_ORDER_REPORTS_VIEW', Session::get('permissions'))) {
                        if($request->segment(1) === 'sales-orders' && $request->segment(2) === 'view') {
                            if(!in_array('SALES_ORDER_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }

                        } elseif($request->segment(1) === 'sales-orders' && $request->segment(2) === 'edit') {
                            if(!in_array('SALES_ORDER_MODIFY', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        } elseif($request->segment(1) === 'sales-orders' && $request->segment(2) === 'view') {

                            if(!in_array('SALES_ORDER_REPORTS_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        }
                    } else {
                        return redirect('/');
                    }


                }


            }

            if($request->segment(1) === 'jobs') {


                if(!in_array('JOBS_ACCESS', Session::get('permissions'))) {

                    if(in_array('JOB_VIEW', Session::get('permissions')) || in_array('JOB_MODIFY', Session::get('permissions'))) {
                        if($request->segment(1) === 'jobs' && $request->segment(2) === 'view') {
                            if(!in_array('JOB_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }

                        } elseif($request->segment(1) === 'jobs' && $request->segment(2) === 'edit') {
                            if(!in_array('JOB_MODIFY', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        }
                    } else {
                        return redirect('/');
                    }


                }


            }

            if($request->segment(1) === 'expenses') {

                if(!in_array('EXPENSE_ACCESS', Session::get('permissions'))) {

                    if(in_array('EXPENSE_VIEW', Session::get('permissions')) || in_array('EXPENSE_MODIFY', Session::get('permissions')) || in_array('EXPENSE_REPORTS_VIEW', Session::get('permissions'))) {
                        if($request->segment(1) === 'expenses' && $request->segment(2) === 'view') {
                            if(!in_array('EXPENSE_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }

                        } elseif($request->segment(1) === 'expenses' && $request->segment(2) === 'edit') {
                            if(!in_array('EXPENSE_MODIFY', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        }
                    } else {
                        return redirect('/');
                    }


                }


            }

            if($request->segment(1) === 'inventory') {


                if(!in_array('INVENTORY_ACCESS', Session::get('permissions'))) {

                    if(in_array('INVENTORY_VIEW', Session::get('permissions')) || in_array('INVENTORY_MODIFY', Session::get('permissions')) || in_array('INVENTORY_REPORTS_VIEW', Session::get('permissions'))) {
                        if($request->segment(1) === 'inventory' && $request->segment(2) === 'view') {
                            if(!in_array('INVENTORY_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }

                        } elseif($request->segment(1) === 'inventory' && $request->segment(2) === 'edit') {
                            if(!in_array('INVENTORY_MODIFY', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        } elseif($request->segment(1) === 'inventory' && $request->segment(2) === 'view') {

                            if(!in_array('INVENTORY_REPORTS_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        }
                    } else {
                        return redirect('/');
                    }


                }


            }

            if($request->segment(1) === 'timesheets') {


                if(!in_array('TIMESHEETS_ACCESS', Session::get('permissions'))) {

                    if(in_array('TIMESHEETS_VIEW', Session::get('permissions')) || in_array('TIMESHEETS_MODIFY', Session::get('permissions')) || in_array('TIMESHEET_REPORTS_VIEW', Session::get('permissions'))) {
                        if($request->segment(1) === 'timesheets' && $request->segment(2) === 'view') {
                            if(!in_array('TIMESHEETS_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }

                        } elseif($request->segment(1) === 'timesheets' && $request->segment(2) === 'edit') {
                            if(!in_array('TIMESHEETS_MODIFY', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        } elseif($request->segment(1) === 'timesheets' && $request->segment(2) === 'view') {

                            if(!in_array('TIMESHEET_REPORTS_VIEW', Session::get('permissions'))) {
                                return redirect('/');
                            }
                        }
                    } else {
                        return redirect('/');
                    }


                }


            }
            if($request->segment(1) === 'reports') {


                if(!in_array('REPORTS_ACCESS', Session::get('permissions'))) {
                    return redirect('/');
                }


            }

            if($request->segment(1) === 'hub') {

                if(Session::get('permissions') !== "SUPER_ADMINISTRATOR")
                    if(!in_array('HUB_ACCESS', Session::get('permissions'))) {

                        return redirect('/');
                    }

            }


            $response = $next($request);

            return $response;
        }
    }
