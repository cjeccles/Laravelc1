import React from 'react'
import { useForm, Head } from '@inertiajs/react'
import FormGroup from '../components/FormGroup';



export default function Login() {

  const { data, setData, post, processing, errors, setError } = useForm ({
    email: '',
    password: '',
    name: '',
  })

  function handleSubmit(e) {
    e.preventDefault();

    post('/login', {
      onSuccess: () => {
        setError('email', "Invalid email or password")
        //set the redirect here
      }
    })

  }
  
  return (
    <>
    <Head>
        <title>C1 - Login Page</title>
        <meta name="description" content="This is a login page" />
    </Head>

        <form className="flex flex-col border-gray-900 max-w-md mx-auto" onSubmit={handleSubmit}>

            <FormGroup errorMessage={errors.email} label="Email" type="email" name="email" placeholder="Email Address" value={data.email} onChange={e => setData('email', e.target.value)} />
            <FormGroup errorMessage={errors.password} label="Password" type="password" name="password" id="password" placeholder="Password" value={data.password} onChange={e => setData('password', e.target.value)} />
    
            <button className='border border-slate-800 rounded-md bg-slate-600 text-white py-2 mt-6 disabled:bg-slate-900' disabled={processing}>Login</button>
        </form>
    </>
  )
}
