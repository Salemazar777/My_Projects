<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use Auth;
class CustomerController extends Controller
{
    public function CustomerAll()
    {
        $customer = Customer::latest()->get();
        return view('backend.customer.customer_all',compact('customer'));
    }

    public function CustomerAdd(Request $request)
    {
        return view('backend.customer.customer_add');
    }

    public function CustomerStore(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
            'image' => 'required',
        ]);
        $file =  time().".".$request->image->extension(); 
        $request->image->move('image/customer/', $file);
         Customer::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'customer_image' => $file,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('customer.all'); 
      }

      public function CustomerEdit($id)
      {
        $customer = Customer::find($id);
        return view('backend.customer.customer_edit',compact('customer'));
      }

      public function CustomerUpdate(Request $request)
      {
        $request->validate([
            'name'      => 'required|string',
            'mobile_no' => 'required',
            'email'     => 'required|email',
            'address'   => 'required|string',
            'image'     => 'required',
        ]);
        $customer_id = $request->id;
        $file =  time().".".$request->image->extension(); 
        $request->image->move('image/customer/', $file);
        Customer::find($customer_id)->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'customer_image' => $file,
            'updated_by' => Auth::user()->id,
        ]);
        return redirect()->route('customer.all');
      }

      public function CustomerDelete($id)
      {
            $customer = Customer::find($id);
            $image = $customer->customer_image;
            unlink('image/customer/'.$image);
            Customer::find($id)->delete();
            return redirect()->route('customer.all');
      }

      public function CreditCustomer()
      {
            $allData = Payment::WhereIn('paid_status',['full_due','partial_paid'])->get();
            return view('backend.customer.customer_credit',compact('allData'));
      }

      public function CreditCustomerPrintPdf()
      {
        $allData = Payment::WhereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('allData'));
      }

      public function CustomerEditInvoice($id)
      {
          $payment = Payment::where('invoice_id',$id)->first();
          return view('backend.customer.edit_customer_invoice',compact('payment'));
      }

      public function CustomerUpdateInvoice(Request $request,$id)
      {
          if ($request->new_paid_amount < $request->paid_amount) {
              return redirect()->back()->with('max_amount','Sorry You Paid Maximum value');
          }
      }

      public function CustomerInvoiceDetailsPdf($id)
      {
          $payment = Payment::where('invoice_id',$id)->first();
          return view('backend.pdf.invoice_details_pdf',compact('payment'));
      }

      public function PaidCustomer()
      {
            $allData = Payment::where('paid_status','!=','full_due')->get();
            return view('backend.customer.customer_paid',compact('allData'));
      }

      public function PaidCustomerPrintPdf()
      {
            $allData = Payment::where('paid_status','!=','full_due')->get();
            return view('backend.pdf.customer_paid_pdf',compact('allData'));
      }

      public function CustomerWiseReport()
      {
            $customers = Customer::all();
            return view('backend.customer.customer_wise_report',compact('customers'));
      }

      public function CustomerWiseCreditReport(Request $request)
      {
             $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
             return view('backend.pdf.customer_wise_credit_pdf',compact('allData'));
      }

      public function CustomerWisePaidReport(Request $request)
      {
            $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
            return view('backend.pdf.customer_wise_paid_pdf',compact('allData'));
      }

}
