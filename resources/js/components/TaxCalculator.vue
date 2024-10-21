<template>
    <div class="container mt-3 d-flex flex-column align-items-center">
        <div class="row w-100 justify-content-center mb-3">
            <div class="col-6">
                <h1>Tax Calculator</h1>
                <div class="mb-3">
                    <input v-model="salary" class="form-control" placeholder="Enter your annual salary" />
                    <div v-if="errors.salary" class="text-danger">{{ errors.salary[0] }}</div>
                </div>
                <button @click="calculateSalary" class="btn btn-primary">Calculate</button>
                <div class="mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-4">Income Details</th>
                                <th class="col-8">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gross Annual Salary</td>
                                <td>£{{ result.gross_annual_salary || 0 }}</td>
                            </tr>
                            <tr>
                                <td>Gross Monthly Salary</td>
                                <td>£{{ result.gross_monthly_salary || 0 }}</td>
                            </tr>
                            <tr>
                                <td>Net Annual Salary</td>
                                <td>£{{ result.net_annual_salary || 0 }}</td>
                            </tr>
                            <tr>
                                <td>Net Monthly Salary</td>
                                <td>£{{ result.net_monthly_salary || 0 }}</td>
                            </tr>
                            <tr>
                                <td>Annual Tax Paid</td>
                                <td>£{{ result.annual_tax_paid || 0 }}</td>
                            </tr>
                            <tr>
                                <td>Monthly Tax Paid</td>
                                <td>£{{ result.monthly_tax_paid || 0 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row w-100 justify-content-center p-0 h-400">
            <div class="col-6">
                <h1>Tax Bands</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tax Band</th>
                            <th scope="col">Lower Limit</th>
                            <th scope="col">Upper Limit</th>
                            <th scope="col">Rate %</th>
                            <th scope="col">Employees With Salaries</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(taxBand) in taxBands" :key="taxBand.id">
                            <td>{{ taxBand.name }}</td>
                            <td>{{ taxBand.lower_limit }}</td>
                            <td>{{ taxBand.upper_limit == null ? 'without' : taxBand.upper_limit }}</td>
                            <td>{{ taxBand.rate }}</td>
                            <td>
                                <ul class="p-0">
                                    <li v-for="employee in taxBand.employees" :key="employee.id">{{ employee.name }}, {{ employee.salary }}</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            salary: '',
            result: '',
            taxBands: [],
            errors: ''
        };
    },
    methods: {
        fetchTaxBands() {
            axios.get('/api/tax-bands').then(response => {
                this.taxBands = response.data;
            }).catch(error => {
                console.error('Error fetching tax bands:', error);
            });
        },
        calculateSalary() {
            this.errors = '';
            axios.post('/api/calculate-salary-tax', {
                salary: this.salary
            }).then(response => {
                this.result = response.data;
            }).catch(error => {
                if (error.response && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                } else {
                    console.error('Error calculating salary:', error);
                }
            });
        }
    },
    created() {
        this.fetchTaxBands();
    }
}
</script>