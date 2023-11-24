import React, {useState} from 'react'
import { useForm, Head } from '@inertiajs/react'
import FormGroup from '../components/FormGroup';



export default function Register() {

  const { data, setData, post, processing, errors } = useForm ({
    email: '',
    password: '',
    name: '',
  })

  const [success, setSuccess] = useState(false);

  function handleSubmit(e) {
    e.preventDefault();

    post('/register', {
      onSuccess: () => {
        setSuccess(true)
      }
    })

  }
  
  return (
    <>
    <Head>
      <title>C1 - Register Page</title>
      <meta name="description" content="This is a sign up page" />
    </Head>
      <form className="flex flex-col border-gray-900 max-w-md mx-auto" onSubmit={handleSubmit}>

          <FormGroup errorMessage={errors.name} label="Full Name" type="text" name="name" placeholder="Name" value={data.name} onChange={e => setData('name', e.target.value)} />
          <FormGroup errorMessage={errors.email} label="Email" type="email" name="email" placeholder="Email Address" value={data.email} onChange={e => setData('email', e.target.value)} />
          <FormGroup errorMessage={errors.password} label="Password" type="password" name="password" id="password" placeholder="Password" value={data.password} onChange={e => setData('password', e.target.value)} />

          {success && <span className="text-green-500 text-lg">You have signed up successfully</span>}
          <button className='border border-slate-800 rounded-md bg-slate-600 text-white py-2 mt-6 disabled:bg-slate-900' disabled={processing}>Sign Up</button>
      </form>
    </>
  )
}
