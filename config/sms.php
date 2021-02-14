<?php


$customer_merge_fields = [
    '{full_name}',
    '{client_name}',
    '{contact_email}',
];

$supplier_merge_fields = [
    '{supplier_name}',
    '{supplier_email}',
];

$purchase_merge_fields = [
    '{purchase_link}',
    '{purchase_ref}',
    '{purchase_date}',
    '{purchase_due_date}',
    '{purchase_status}',
    '{purchase_subtotal}',
    '{purchase_total}',
    '{site_name}',
];

$return_merge_fields = [
    '{return_stock_link}',
    '{return_stock_ref}',
    '{return_stock_date}',
    '{return_stock_due_date}',
    '{return_stock_status}',
    '{return_stock_subtotal}',
    '{return_stock_total}',
    '{site_name}',
];

$invoice_merge_fields = [
    '{invoice_link}',
    '{invoice_ref}',
    '{invoice_date}',
    '{invoice_due_date}',
    '{invoice_status}',
    '{invoice_subtotal}',
    '{invoice_total}',
    '{site_name}',
];
$proposal_merge_fields = [
    '{proposal_ref}',
    '{proposal_link}',
    '{proposal_date}',
    '{proposal_due_date}',
    '{proposal_status}',
    '{proposal_subtotal}',
    '{proposal_total}',
    '{proposal_related_to}',
    '{site_name}',
];


return [

    'triggers' => [
        'sms_invoice_reminder' => [
            'merge_fields' => array_merge($customer_merge_fields, $invoice_merge_fields),
            'label' => 'Invoice Reminder Notice',
            'info' => 'Send SMS when invoice reminder notice sent when send invoice to client primary contact.',
        ],
        'sms_invoice_overdue' => [
            'merge_fields' => array_merge($customer_merge_fields, $invoice_merge_fields),
            'label' => 'Invoice Overdue Notice',
            'info' => 'Send SMS when invoice overdue notice  sent to client primary contact.',
        ],
        'sms_payment_recorded' => [
            'merge_fields' => array_merge($customer_merge_fields, $invoice_merge_fields, ['{payment_amount}', '{payment_date}']),
            'label' => 'Invoice Payment Recorded',
            'info' => 'Send SMS when invoice payment is saved.',
        ],
        'sms_estimate_exp_reminder' => [
            'merge_fields' => array_merge(
                $customer_merge_fields,
                [
                    '{estimate_link}',
                    '{estimate_ref}',
                    '{estimate_date}',
                    '{estimate_due_date}',
                    '{estimate_status}',
                    '{estimate_subtotal}',
                    '{estimate_total}',
                    '{site_name}',
                ]
            ),
            'label' => 'Estimate Expiration Reminder',
            'info' => 'Send SMS when expiration Estimate  sent to client primary contact.',
        ],
        'sms_proposal_exp_reminder' => [
            'merge_fields' => $proposal_merge_fields,
            'label' => 'Proposal Expiration Reminder',
            'info' => 'Send SMS when expiration reminder send to Related Proposals.',
        ],
        'sms_purchase_confirmation' => [
            'merge_fields' => array_merge($supplier_merge_fields, $purchase_merge_fields),
            'label' => 'Purchase Notice',
            'info' => 'Send SMS when Purchase confirmation/update stock notice sent to ',
            'sms_number' => true,
        ],
        'sms_purchase_payment_confirmation' => [
            'merge_fields' => array_merge($supplier_merge_fields, $purchase_merge_fields, ['{payment_amount}', '{payment_date}']),
            'label' => 'Purchase payment Notice',
            'info' => 'Send SMS when Purchase payment confirmation notice sent.',
        ],
        'sms_return_stock' => [
            'merge_fields' => array_merge($supplier_merge_fields, $return_merge_fields),
            'label' => 'Purchase Return Stock Notice',
            'info' => 'Send SMS when Purchase return stock notice sent.',
        ],
        'sms_transaction_record' => [
            'merge_fields' => [
                '{transaction_type}',
                '{transaction_title}',
                '{transaction_date}',
                '{transaction_amount}',
                '{transaction_account}',
                '{transaction_balance}',
                '{transaction_paid_by}',
                '{transaction_link}',
            ],
            'label' => 'Transaction Record expense/deposit/transfer',
            'info' => 'Send SMS when Transaction Record expense/deposit/transfer notified for reminder.',
            'sms_number' => true,
        ],
        'sms_staff_reminder' => [
            'merge_fields' => [
                '{name}',
                '{reference}',
                '{reminder_description}',
                '{reminder_date}',
                '{reminder_related}',
                '{reminder_related_link}',
                '{site_name}',
            ],
            'label' => 'Staff Reminder',
            'info' => 'Send SMS when staff notified for reminder.',
        ],
    ]
];